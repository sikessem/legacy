<?php
namespace SIKessEm\Net\Web\HTML;

abstract class Abstract_Document extends Abstract_Component implements Document_Interface {
  public function __construct(string $type = 'html') {
      $this->setType($type);
      $this->setRoot(new Final_Element('html'));
  }

  abstract protected function setType(string $type): static;
  abstract protected function setRoot(Element_Interface $root): Element_Interface;
}