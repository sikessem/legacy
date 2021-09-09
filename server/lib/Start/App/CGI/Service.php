<?php namespace Start\App\CGI;

use \Start\App\Service as GeneralService;

class Service extends GeneralService {

  public function __construct(string $pattern, string $name, callable $callback) {
    $this->pattern = $pattern;
    parent::__construct($name, $callback);
  }

  public function pattern(): string {
    return $this->pattern;
  }

  public function match(string $path): bool {
    $path = trim($path, '/');
    $pattern = str_replace('/', '\/', $this->pattern);
    $pattern = preg_replace_callback('/\:([\w]+)/', [$this, 'matchKey'], $pattern);
    $pattern = "/^$pattern$/i";

    if(!preg_match($pattern, $path, $matches))
      return false;

    array_shift($matches);
    $this->setOptions($matches);

    return true;
  }

  protected function matchKey(array $matches) {
    return isset($this->constraints[$matches[1]])? "(?<{$matches[1]}>{$this->constraints[$matches[1]]})": '(?<$1>[^\/]+)';
  }

  public function path(array $options = []): string {
    $path = $this->pattern;
    foreach($options as $key => $value)
      $path = str_replace(":$key", $value, $path);
    return $path;
  }
}
