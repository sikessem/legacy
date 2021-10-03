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
  function attributes(array $list): Attributes_Interface {
    return new Final_Attributes($list);
  }
}

if (!function_exists(__NAMESPACE__ . '\\element')) {
  function element(string $name, array|Attribute_Interface $attributes = [], null|string|Element_Interface|array $content = null): Element_Interface {
    return new Final_Element($name, $attributes, $content);
  }
}

if (!function_exists(__NAMESPACE__ . '\\document')) {
  function document(string $type = 'html'): Document_Interface {
    return new Final_Document($type);
  }
}

if (!function_exists(__NAMESPACE__ . '\\text')) {
  function text(string $value): Text_Interface {
    return new Final_Text($value);
  }
}

if (!function_exists(__NAMESPACE__ . '\\create')) {
  /**
   * Create many elements in an array
   *
   * @param  integer                                  $count The number of elements to create
   * @param  string                                   $name The name of elements tag
   * @param  array                                    $attributes The list of elements attributes
   * @param  array                                    $contents The list of elements contents
   * @param  array|Attribute_Interface                $with List of the common attributes
   * @param  null|string|Element_Interface|array|null $default The value of the default content
   * @return array                                    The list of elements created
   */
  function create(int $count, string $name, array $attributes = [], array $contents = [], null|array|Attribute_Interface $with = null, null|string|Element_Interface|array $default = null): array {
    $elements = [];
    for ($key = 0; $key < $count; $key++) {
      if (isset($attributes[$key])) {
        $element_attributes = $attributes[$key];
        if (isset($with)) {
          if (is_array($element_attributes)) {
            if (is_array($with))
              $element_attributes = $with + $element_attributes;
            else
              $element_attributes[] = $with;
          } else {
            if (!is_array($with)) {
              $with[] = $element_attributes;
              $element_attributes = $with;
            } else {
              $element_attributes = [$with, $element_attributes];
            }
          }
        }
      } else $element_attributes = $with ?? [];
      $elements[] = element($name, $element_attributes, $contents[$key] ?? $default);
    }
    return $elements;
  }
}