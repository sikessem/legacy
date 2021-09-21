<?php
namespace SIKessEm\Net\Web\HTML;

abstract class Abstract_ComponentName extends Abstract_Component implements Name_Interface {
  public function __construct(string $name) {
    $this->setName($name);
  }

  abstract protected function setName(string $name): static;
}