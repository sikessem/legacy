<?php
namespace SIKessEm\Net\Web\HTML;

interface Attribute_Interface extends Component_Interface {

  public function setName(string $name): static;

  public function getName(): string;

  public function setValue(string $value): static;

  public function getValue(): string;
}