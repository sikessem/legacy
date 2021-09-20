<?php
namespace SIKessEm\Net\Web\HTML;

interface Attribute_Interface extends Component_Interface {
  public function is(string $name): bool;
  public function getName(): string;
  public function setValue(string $value): static;
  public function getValue(): string;
}