<?php
namespace SIKessEm\Net\Web\HTML;

interface Attributes_Interface extends Component_Interface, \ArrayAccess, \Countable, \IteratorAggregate {
  public function getList(): array;
  public function set(string|Attribute_Interface|array|Attributes_Interface $attributes, null|string|Text_Interface $value = null): static;
  public function get(string|array $attributes): null|array|Text_Interface;
  public function isset(string|array $attributes): bool;
  public function unset(string|array $attributes): void;
}