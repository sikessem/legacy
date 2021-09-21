<?php
namespace SIKessEm\Net\Web\HTML;

abstract class Abstract_Element extends Abstract_ComponentName implements Element_Interface {
  public function __construct(string $name, array|Attribute_Interface $attributes = [], null|string|Element_Interface|array $content = null) {
    parent::__construct($name);
    $this->setAttributes($attributes);
    $this->setContent($content);
  }
}