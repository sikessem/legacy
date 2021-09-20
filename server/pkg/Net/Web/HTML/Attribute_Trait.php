<?php
namespace SIKessEm\Net\Web\HTML;

trait Attribute_Trait {

  protected string $name;

  protected function setName(string $name): static {
    $name = Filter::sanitize($name);
    if (!Filter::validate($name))
      throw new Error("Invalid attribute name give", Error::INVALID_NAME);
    $this->name = $name;
    return $this;
  }

  public function getName(): string {
    return $this->name;
  }

  public function is(string $name): bool {
	return $this->name === Filter::sanitize($name);
  }

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