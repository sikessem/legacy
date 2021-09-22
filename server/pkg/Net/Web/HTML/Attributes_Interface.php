<?php
namespace SIKessEm\Net\Web\HTML;

interface Attributes_Interface extends Component_Interface {
  public function setAttributes(array|Attribute_Interface $attributes): static;
  public function addAttributes(array $attributes): static;
  public function addAttribute(Attribute_Interface $attribute): Attribute_Interface;
  public function getAttributes(): array;
  public function hasAttributes(): bool;
  public function setAttribute(string $name, string $value): Attribute_Interface;
  public function getAttribute(string $name): ?Attribute_Interface;
  public function hasAttribute(string $name): bool;
}