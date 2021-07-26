<?php namespace Start\CGI;

use \Start\Service as WebService;

class Service extends WebService {

  public function __construct(string $path, string $name, callable $callback) {
    $this->path = $path;
    parent::__construct($name, $callback);
  }

  public function path(): string {
    return $this->path;
  }

  public function match(string $pattern): bool {
    return true;
  }

  public function process(): mixed {
    return ($this->callback)();
  }
}
