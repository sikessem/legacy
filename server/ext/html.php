<?php namespace SIKessEm\Net\Web\HTML;

if (!function_exists(__NAMESPACE__ . '\\attribute')) {
  function attribute(string $name, string $value): Attribute_Interface {
    return new Final_Attribute($name, $value);
  }
}

if (!function_exists(__NAMESPACE__ . '\\className')) {
  function className(string $value): Attribute_Interface {
    return attribute('class', $value);
  }
}

if (!function_exists(__NAMESPACE__ . '\\attributes')) {
  function attributes(array $list): string {
    $string = '';
    foreach($list as $name => $value)
      $string .= ' ' . attribute($name, $value);
    return trim($string, ' ');
  }
}