<?php
namespace SIKessEm\Net\Web\HTML;

trait AttributesList_Trait {
  use Component_Trait;

  protected array $attributes;

  public function setAttributes(array $list): static {
    $this->attributes = [];
    $this->addAttributes($list);
    return $this;
  }

  public function addAttributes(array $list): static {
    foreach ($list as $name => $value)
      $this->setAttribute($name, $value);
    return $this;
  }
  
  public function setAttribute(string $name, string $value): Attribute_Interface {
    if ($attribute = $this->getAttribute($name))
      $attribute->setValue($value);
    else
      $attribute = $this->attributes[] = new Attribute($name, $value);
    return $attribute;
  }
  
  public function getAttributes(): array {
    return $this->attributes;
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