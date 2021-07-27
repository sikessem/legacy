<?php namespace Start\App;

use \Closure, \ReflectionFunction, \ReflectionMethod, \ReflectionException, \ValueError;

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
    $reflection = $this->callbackReflection();
    $params = $reflection->getParameters();
    $args = []; $key = 0;
    $options = [];
    foreach($params as $param) {
      $args[] = $this->param($param->name) ?? $this->arg($key) ?? null;
      $key++;
    } return ($this->bindCallback() ?? $this->callback)(...$args);
  }

  public function with(string $key, string $pattern): self {
    $this->constraints[$key] = str_replace('(', '(?:', $pattern);
    return $this;
  }

  protected function bindCallback(): ?Closure {
    if($this->callbackIsBindable()) {
        return $this->callbackReflection() instanceof ReflectionMethod?
          $this->callback()->bindTo($reflection->getClosureThis(), $reflection->getClosureScopeClass()):
          $this->callback()->bindTo($this, $this::class);
    } return null;
  }

  protected function callbackIsBindable(): bool {
    return !(is_array($this->callback()) || is_string($this->callback())) && ($this->callbackReflection()->getClosureScopeClass() === null || $this->callbackReflection()->getClosureThis() !== null);
  }

  protected function callbackReflection(): ReflectionFunction|ReflectionMethod {
    $callback = $this->callback();
    try {
      return is_array($callback)? new ReflectionMethod($callback[0], $callback[1]): new ReflectionMethod($callback);
    } catch(ReflectionException|ValueError $e) {
      return new ReflectionFunction($callback);
    }
  }
}
