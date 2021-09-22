<?php
namespace SIKessEm\Net\Web\HTML;

trait Attributes_Trait {
  use Component_Trait;

  protected array $attributes;

  public function setAttributes(array|Attribute_Interface $attributes): static {
    $this->attributes = [];
    if(is_array($attributes))
      $this->addAttributes($attributes);
    else
      $this->addAttribute($attributes);
    return $this;
  }

  public function addAttributes(array $attributes): static {
    foreach ($attributes as $name => $value)
      is_object($value) ? $this->addAttribute($value) : $this->setAttribute($name, $value);
    return $this;
  }
  
  public function setAttribute(string $name, string $value): Attribute_Interface {
    if ($attribute = $this->getAttribute($name))
      $attribute->setValue($value);
    else
      $attribute = $this->addAttribute(new Attribute($name, $value));
    return $attribute;
  }

  public function addAttribute(Attribute_Interface $attribute): Attribute_Interface {
    return $this->attributes[] = $attribute;
  }
  
  public function getAttributes(): array {
    return $this->attributes;
  }

  public function hasAttributes(): bool {
    return !empty($this->attributes);
  }
  
  public function getAttribute(string $name): ?Attribute_Interface {
    foreach ($this->attributes as $attribute)
      if ($attribute->getName($name) ===  $name)
        return $attribute;
    return null;
  }

  public function hasAttribute(string $name): bool {
    foreach ($this->attributes as $attribute)
      if ($attribute->getName($name) === $name)
        return true;
    return false;
  }

  public function render(): string {
    $string = '';
    foreach($this->attributes as $attribute)
      $string .= ' ' . $attribute;
    return trim($string);
  }
}