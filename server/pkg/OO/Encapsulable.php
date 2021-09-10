<?php
namespace SIKessEm\OO;

interface Encapsulable {

  public function __get(string $name): mixed;

  public function __set(string $name, mixed $value): void;
}