<?php
namespace SIKessEm\Net\Web\HTML;

use \Traversable, \ArrayIterator;

trait Attributes_Trait {
  use Component_Trait;

  protected array $html_attributes_list = [];

  public function getList(): array {
    return $this->html_attributes_list;
  }

  public function set(string|Attribute_Interface|array|Attributes_Interface $attributes, null|string|Text_Interface $value = null): static {
    if (is_iterable($attributes)) {
      foreach ($attributes as $name => $attribute)
        if (is_array($attribute) || is_object($attribute)) $this->set($attribute);
        else isset($value) ? $this->set($attribute, $value) : $this->set($name, $attribute);
    } else {
      if ($attribute = $this->get($attributes))
        $attribute->setValue($value);
      else
        $this->html_attributes_list[] = is_string($attributes) ? new Final_Attribute($attributes, $value) : $attributes;
    }
    
    return $this;
  }
  
  public function get(string|array $attributes): null|array|Text_Interface {
    if (is_iterable($attributes)) {
      $values = [];
      foreach ($attributes as $key => $attribute)
        if ($this->isset($attribute))
          $values[$key] = $this->get($attribute);
      return $values;
    }

    if (isset($attributes)) {
      foreach ($this->html_attributes_list as $attribute)
        if ($attribute->getName() === $attributes)
          return $attribute->getValue();
      return null;
    }

    return $this->getList();
  }
  
  public function isset(string|array $attributes): bool {
    if(!isset($this->html_attributes_list))
      return false;

    if (is_iterable($attributes)) {
      foreach ($attributes as $attribute)
        if (!$this->isset($attribute))
          return false;
      return true;
    }

    if (isset($attributes)) {
      foreach ($this->html_attributes_list as $attribute)
        if ($attribute->is($attributes))
          return $attribute;
    }

    return !empty($this->html_attributes_list);
  }
  
  public function unset(string|array $attributes): void {
    if (is_iterable($attributes)) {
      foreach ($attributes as $attribute)
        $this->unset($attribute);
    }
    else unset($this->html_attributes_list[$attributes]);
  }

  public function render(): string {
    $string = '';
    foreach($this->html_attributes_list as $attribute)
      $string .= ' ' . $attribute;
    return trim($string);
  }

  public function count(): int {
    return count($this->getList());
  }

  public function offsetExists(mixed $offset): bool {
    return $this->isset($offset);
  }

  public function offsetGet(mixed $offset): mixed {
    return $this->get($offset);
  }

  public function offsetSet(mixed $offset, mixed $value): void {
    $this->set($offset, $value);
  }

  public function offsetUnset(mixed $offset): void {
    $this->unset($offset);
  }

  public function getIterator(): Traversable {
    return new ArrayIterator($this->getList());
  }
}