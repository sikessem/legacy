<?php
namespace SIKessEm\Net\Web\HTML;

trait Attribute_Trait {
  use Name_Trait;

  protected string $value;

  public function setValue(string $value): static {
    $this->value = $value;
    return $this;
  }

  public function getValue(): string {
    return $this->value;
  }

  public function __toString(): string {
    $name = $this->getName();
    $value = $this->getValue();

    if ($name === $value)
      return $name;

    $value = is_int(strpos($value, '\'')) ? '"' . $value . '"' : "'$value'";
    return "$name=$value";
  }
}