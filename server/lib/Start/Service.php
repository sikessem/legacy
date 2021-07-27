<?php namespace Start;

abstract class Service {

  public function __construct(string $name, callable $callback) {
    $this->name = $name;
    $this->callback = $callback;
  }

  protected string $name;

  public function name(): string {
    return $this->name;
  }

  protected $callback;

  public function callback(): callable {
    return $this->callback;
  }

  abstract public function match(string $pattern): bool;

  abstract public function call(): mixed;
}
