<?php namespace Start\CGI;

use \Start\Service as WebService;

class Service extends WebService {

  public function __construct(string $pattern, string $name, callable $callback) {
    $this->pattern = $pattern;
    parent::__construct($name, $callback);
  }

  protected array $constraints = [];

  public function pattern(): string {
    return $this->pattern;
  }

  public function match(string $path): bool {
    $path = trim($path, '/');
    $pattern = preg_replace_callback('/:([\w]+)/', [$this, 'matchKey'], $this->pattern);
    $pattern = "/^$pattern$/i";

    if(!preg_match($pattern, $path, $matches))
      return false;

    array_shift($matches);
    $this->setOptions($matches);

    return true;
  }

  protected array $options = [];

  public function setOptions(array $options): self {
    foreach($options as $key => $value)
      $this->setOption($key, $value);
    return $this;
  }

  public function setOption(string $key, mixed $value): self {
    $this->options[$key] = $value;
    return $this;
  }

  public function getOptions(array $keys = []): array {
    if(empty($keys))
      return $this->options;

    $options = [];
    foreach($keys as $key)
      if($option = $this->getOption($key))
        $options[$key] = $option;
    return $options;
  }

  public function getOption(string $key): mixed {
    return $this->options[$key] ?? null;
  }

  public function args(): array {
    $args = [];
    foreach($this->options as $key => $value)
      if(is_int($key))
        $args[$key] = $value;
    return $args;
  }

  public function arg(string $key): mixed {
    return $this->args()[$key] ?? null;
  }

  public function params(): array {
    $params = [];
    foreach($this->options as $key => $value)
      if(is_string($key))
        $params[$key] = $value;
    return $params;
  }

  public function param(string $key): mixed {
    return $this->params()[$key] ?? null;
  }

  protected function matchKey(array $matches) {
    return isset($this->constraints[$matches[1]])? "(?<{$matches[1]}>{$this->constraints[$matches[1]]})": '(?<$1>[^\/]+)';
  }

  public function call(): mixed {
    return ($this->callback)(...$this->args());
  }

  public function with(string $key, string $pattern): self {
    $this->constraints[$key] = str_replace('(', '(?:', $pattern);
    return $this;
  }
}
