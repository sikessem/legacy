<?php namespace Start;

use \Closure, \ReflectionFunction;

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

  abstract public function with(string $key, string $pattern): self;

  protected function bindCallback(): ?Closure {
    return $this->callbackIsBindable()? $this->callback->bindTo($this, $this::class): null;
  }

  protected function callbackIsBindable(): bool {
    return $this->callbackReflection()->getClosureScopeClass() === null || $this->callbackReflection()->getClosureThis() !== null;
  }

  protected function callbackReflection(): ReflectionFunction {
    return new ReflectionFunction($this->callback);
  }
}
