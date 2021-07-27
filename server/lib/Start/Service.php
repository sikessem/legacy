<?php namespace Start;

use \Closure, \ReflectionFunction;

abstract class Service {

  public function __construct(string $name, callable $callback) {
    $this->name = $name;
    $this->callback = $callback;
  }

  protected string $name;

  protected array $constraints = [];

  public function name(): string {
    return $this->name;
  }

  protected $callback;

  public function callback(): callable {
    return $this->callback;
  }

  abstract public function match(string $pattern): bool;

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

  public function call(): mixed {
    return ($this->bindCallback() ?? $this->callback)(...$this->args());
  }

  public function with(string $key, string $pattern): self {
    $this->constraints[$key] = str_replace('(', '(?:', $pattern);
    return $this;
  }

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
