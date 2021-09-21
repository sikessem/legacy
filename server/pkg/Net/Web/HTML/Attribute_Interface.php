<?php
namespace SIKessEm\Net\Web\HTML;

interface Attribute_Interface extends Component_Interface, Name_Interface {
  public function setValue(string $value): static;
  public function getValue(): string;
}