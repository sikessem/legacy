<?php
namespace SIKessEm\Net\Web\HTTP;

use SIKessEm\OO\{Encapsulable, Encapsulator};

class Server implements Encapsulable {

  use Encapsulator;

  const SOURCES_DIRNAME = 'src';
  const RESOURCES_DIRNAME = 'res';
  const TEMPLATES_DIRNAME = 'tpl';
  const ERRORS_DIRNAME = 'err';

  const SOURCES_EXTENSIONS = ['.php', '.html'];
  const RESOURCES_EXTENSIONS = ['.php', '.html', '.ts', '.js', '.scss', '.css'];
  const TEMPLATES_EXTENSIONS = ['.php', '.html'];
  const ERRORS_EXTENSIONS = ['.php', '.html'];

  public function __construct(protected Response $response) {}

  protected string $folder = '';

  public function setFolder(string $path): static {
    if (is_dir($path))
      $this->folder = realpath($path) . DIRECTORY_SEPARATOR;
    return $this;
  }

  public function getFolder(): string {
    return $this->folder;
  }

  public function setSources(string $path): static {
    return $this->setDir(self::SOURCES_DIRNAME, $path);
  }

  public function getSources(): ?string {
    return $this->getDir(self::SOURCES_DIRNAME);
  }

  public function getSourceFile(string $path): ?string {
    return $this->getFile(self::SOURCES_DIRNAME, $path, self::SOURCES_EXTENSIONS);
  }

  public function getSourceCode(string $path, array $vars = []): mixed {
    return $this->getCode($this->getSourceFile($path), $vars);
  }

  public function setResources(string $path): static {
    return $this->setDir(self::RESOURCES_DIRNAME, $path);
  }

  public function getResources(): ?string {
    return $this->getDir(self::RESOURCES_DIRNAME);
  }

  public function getResourceFile(string $path): ?string {
    return $this->getFile(self::RESOURCES_DIRNAME, $path, self::RESOURCES_EXTENSIONS);
  }

  public function getResourceStream(string $path, string $mode) {
    return $this->getStream($this->getResourceFile($path), $mode);
  }

  public function setTemplates(string $path): static {
    return $this->setDir(self::TEMPLATES_DIRNAME, $path);
  }

  public function getTemplates(): ?string {
    return $this->getDir(self::TEMPLATES_DIRNAME);
  }

  public function getTemplateFile(string $path): ?string {
    return $this->getFile(self::TEMPLATES_DIRNAME, $path, self::TEMPLATES_EXTENSIONS);
  }

  public function getTemplateRender(string $path, array $vars = [], ?callable $callback = null): mixed {
    return $this->getRender($this->getTemplateFile($path), $vars, $callback);
  }

  public function setErrors(string $path): static {
    return $this->setDir(self::ERRORS_DIRNAME, $path);
  }

  public function getErrors(): ?string {
    return $this->getDir(self::ERRORS_DIRNAME);
  }

  public function getErrorFile(string $path): ?string {
    return $this->getFile(self::ERRORS_DIRNAME, $path, self::ERRORS_EXTENSIONS);
  }

  public function getErrorRender(string $path, array $vars = [], ?callable $callback = null): mixed {
    return $this->getRender($this->getErrorFile($path), $vars, $callback);
  }

  protected array $dirs = [];

  public function getDir(string $name): ?string {
    return $this->dirs[$name] ?? null;
  }

  protected function setDir($name, $path): self|false {
    if (is_dir($path = $this->folder . $path)) {
      $path = realpath($path) . DIRECTORY_SEPARATOR;
      $this->dirs[$name] = $path;
    }
    return $this;
  }

  public function getFile(string $dir, string $file, string|array $extensions): ?string {
    $extensions = (array) $extensions;
    if ($dir = $this->getDir($dir))
      foreach ($extensions as $extension)
        if (file_exists($path = $dir . $file . $extension))
          return realpath($path);
    return null;
  }

  protected static function getCode(?string $file, array $vars = []): mixed {
    if (!is_null($file) && is_file($file)) {
      extract($vars);
      return require $file;
    }
    return null;
  }

  protected static function getRender(?string $file, array $vars = [], ?callable $callback = null): ?string {
    if (!is_null($file) && is_file($file)) {
      ob_start($callback);
      extract($vars);
      $contents = require $file;
      if(!is_string($contents))
        $contents = ob_get_clean();
      else
        ob_end_clean();
      return $contents;
    }
    return null;
  }

  public function getStream(string $file, string $mode) {
    return fopen($file, $mode);
  }

  public function getResponse(): Response {
    return $this->response;
  }

  public function serve(Client $client, array $options = []) {

    $request = $client->request;
    $response = $this->response;

    $path = str_replace('/', DIRECTORY_SEPARATOR, $request->path);

    if (!file_exists($file = $this->getSources() . $path))
      $response->code = 404;
    elseif (
      is_file($file) ||
      is_file($file = $this->getSourceFile($path . DIRECTORY_SEPARATOR . $request->method)) ||
      is_file($file = $this->getSourceFile($path . DIRECTORY_SEPARATOR . 'index'))
    )
      $request_handle = require $file;
    else
      $response->code = 405;

    if ($response->code >= 400 && !isset($request_handle)) {
      if (is_file($file = $this->getErrorFile($response->code)))
        $request_handle = require $file;
    }

    http_response_code($response->code);

    if (!isset($request_handle))
      exit;

    $response_handle = $request_handle($client);
    $render = $response_handle($this, $options);

    if (is_file($layout = $this->getTemplateFile('main'))) {
      ob_start();
      require $layout;
      $render = ob_get_clean();
    }
    else
      $render = '';

    if (empty($render))
      http_response_code($response->code);
    exit($render);
  }
}