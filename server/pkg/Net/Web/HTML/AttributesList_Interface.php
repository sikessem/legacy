<?php
namespace SIKessEm\Net\Web\HTML;

interface AttributesList_Interface extends Component_Interface {
  public function setAttributes(array $list): static;
  public function addAttributes(array $list): static;
  public function getAttributes(): array;
  public function setAttribute(string $name, string $value): Attribute_Interface;
  public function getAttribute(string $name): ?Attribute_Interface;
  public function hasAttribute(string $name): bool;
}