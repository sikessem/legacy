<?php

define('ROOT_DIR', dirname(__DIR__) . DIRECTORY_SEPARATOR);

define('CLIENT_DIR', ROOT_DIR . 'client' . DIRECTORY_SEPARATOR);

define('SERVER_DIR', ROOT_DIR . 'server' . DIRECTORY_SEPARATOR);

define('VALUE_PATTERN', '/\<\?\s*(.+?)\s*\?\>/');

require_once ROOT_DIR . 'vendor/autoload.php';

/**
 * Get the path of a template
 *
 * @param  string $name The template name
 * @return string       The template path
 */
function tpl(string $name): string {
  return SERVER_DIR . 'tpl' . DIRECTORY_SEPARATOR . $name . '.php';
}

/**
 * Get the path of a layout
 *
 * @param  string $name The layout name
 * @return string       The layout path
 */
function layout(string $name) {
  return tpl('layouts' . DIRECTORY_SEPARATOR . $name);
}

/**
 * Get the path of a widget
 *
 * @param  string $name The widget name
 * @return string       The widget path
 */
function widget(string $name) {
  return tpl('widgets' . DIRECTORY_SEPARATOR . $name);
}

function parse_values_file(string $file): array {
  if(!is_file($file)) trigger_error('No such file ' . $file);
  $settings = (array) @include $file;
  return parse_values($settings);
}

function parse_values(array $values): array {
  $count = count($values);
  foreach($values as $key => &$value) {
    $offset = 0;
    while($offset < $count && match_value($value)) {
      $value = parse_value($value, $values);
      $offset++;
    }
    if($offset === $count) trigger_error("Bad value set on $key (It defines itself)");
  }
  return $values;
}

function match_value(string $value): bool {
  return (bool) preg_match(VALUE_PATTERN, $value);
}

function parse_value(string $value, array $values): string {
  if(preg_match_all(VALUE_PATTERN, $value, $matches)) {
    foreach($matches[1] as $match_key => $match_value) {
      if(isset($values[$match_value]))
        $value_replace = $values[$match_value];
      elseif(isset($values[$match_value]))
        $value_replace = $values[$match_value];
      elseif(isset($GLOBALS[$match_value]))
        $value_replace = $GLOBALS[$match_value];
      elseif (defined($match_value))
        $value_replace = constant($match_value);
      else
        $value_replace = $matches[0][$match_key];
      $value = str_replace($matches[0][$match_key], $value_replace, $value);
    }
  }
  return $value;
}

return (function(){
  $options = parse_values_file(__DIR__ . '/cfg/program.php');
  return $options;
})();
