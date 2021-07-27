<?php namespace Start\CGI;

use \Start\Service as WebService;

class Service extends WebService {

  public function __construct(string $pattern, string $name, callable $callback) {
    $this->pattern = $pattern;
    parent::__construct($name, $callback);
  }

  protected array $matches = [
    'arguments' => [],
    'parameters' => []
  ];

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
    foreach($matches as $key => $value)
      $this->matches[is_int($key)? 'arguments': 'parameters'][$key] = $value;

    return true;
  }

  protected function matchKey(array $matches) {
    return isset($this->constraints[$matches[1]])? "(?<{$matches[1]}>{$this->constraints[$matches[1]]})": '(?<$1>[^\/]+)';
  }

  public function call(): mixed {
    return ($this->callback)(...$this->matches['arguments']);
  }

  public function with(string $key, string $pattern): self {
    $this->constraints[$key] = $pattern;
    return $this;
  }
}
