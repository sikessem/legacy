<?php namespace SIKessEm\Net\Web\HTML;

if (!function_exists(__NAMESPACE__ . '\\attribute')) {
  function attribute(string $name, string $value): Attribute_Interface {
    return new Final_Attribute($name, $value);
  }
}

if (!function_exists(__NAMESPACE__ . '\\className')) {
  function className(string $value): ClassName_Interface {
    return new Final_ClassName($value);
  }
}

if (!function_exists(__NAMESPACE__ . '\\attributes')) {
  function attributes(array $list): AttributesList_Interface {
    return new Final_AttributesList($list);
  }
}

if (!function_exists(__NAMESPACE__ . '\\element')) {
  function element(string $name, array|Attribute_Interface $attributes = [], null|string|Element_Interface|array $content = null): Element_Interface {
    return new Final_Element($name, $attributes, $content);
  }
}