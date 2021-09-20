<?php
namespace SIKessEm\Net\Web\HTML;

abstract class Abstract_Attribute implements Attribute_Interface {
  public function __construct(string $name, string $value) {
    $this->setName($name)->setValue($value);
  }

  abstract protected function setName(string $name): static;
}