<?php
namespace SIKessEm\Net\Web\HTML;

abstract class Abstract_Attribute extends Abstract_NodeName implements Attribute_Interface {
  public function __construct(string $name, string $value) {
    $this->setName($name)->setValue($value);
  }
}