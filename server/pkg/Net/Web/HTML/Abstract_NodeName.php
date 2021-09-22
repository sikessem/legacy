<?php
namespace SIKessEm\Net\Web\HTML;

abstract class Abstract_NodeName extends Abstract_Node implements Name_Interface {
  public function __construct(string $name) {
    $this->setName($name);
  }

  abstract protected function setName(string $name): static;
}