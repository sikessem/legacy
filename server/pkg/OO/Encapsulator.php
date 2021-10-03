<?php namespace SIKessEm\OO;

trait Encapsulator {

  public function __get(string $name): mixed {

    return method_exists($this, $get = 'get' . ucfirst($name)) ? $this->$get($name) : null;
  }

  public function __set(string $name, mixed $value): void {

    if (method_exists($this, $set = 'set' . ucfirst($name)))
      $this->$set($value);
  }
}