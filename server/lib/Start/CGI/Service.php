<?php namespace Start\CGI;

use \Start\Service as WebService;

class Service extends WebService {

  public function __construct(string $pattern, string $name, callable $callback) {
    $this->pattern = $pattern;
    parent::__construct($name, $callback);
  }

  protected array $matches = [];

  public function pattern(): string {
    return $this->pattern;
  }

  public function match(string $path): bool {
    $path = trim($path, '/');
    $pattern = preg_replace('/:([\w]+)/', '(?<$1>[^\/]+)', $this->pattern);
    $pattern = "/^$pattern$/i";

    if(!preg_match($pattern, $path, $matches))
      return false;

    array_shift($matches);
    $this->matches = $matches;

    return true;
  }

  public function process(): mixed {
    return ($this->callback)();
  }
}
