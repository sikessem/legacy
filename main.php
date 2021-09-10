<?php

use SIKessEm\Net\Web\HTTP\{
  Client,
  Request,
  Server,
  Response
};

require_once __DIR__ . '/vendor/autoload.php';

function main(): void {

  $root_dir = __DIR__ .  DIRECTORY_SEPARATOR;
  $base_url = '/';

  $server_folder = $root_dir . 'server';

  $request = new Request($_SERVER['REQUEST_METHOD'], $base_url . $_SERVER['REQUEST_URI'], $_SERVER['REQUEST_SCHEME'] ?? null);
  $response = new Response(http_response_code());
  $client = new Client($request);
  $server = new Server($response);
  
  $server->setFolder($server_folder);
  $server->setSources('src');
  $server->setResources('res');
  $server->setTemplates('tpl');
  $server->setErrors('err');

  $options = parse_values_file($server_folder . '/cfg/program.php');
  $server->serve($client, $options);
}


define('VALUE_PATTERN', '/\<\?\s*(.+?)\s*\?\>/');

function parse_values_file(string $file): array {
  if (!is_file($file))
    trigger_error('No such file ' . $file);
  $settings = (array)@include $file;
  return parse_values($settings);
}

function parse_values(array $values): array {
  $count = count($values);
  foreach ($values as $key => &$value) {
    $offset = 0;
    while ($offset < $count && match_value($value)) {
      $value = parse_value($value, $values);
      $offset++;
    }
    if ($offset === $count)
      trigger_error("Bad value set on $key (It defines itself)");
  }
  return $values;
}

function match_value(string $value): bool {
  return (bool)preg_match(VALUE_PATTERN, $value);
}

function parse_value(string $value, array $values): string {
  if (preg_match_all(VALUE_PATTERN, $value, $matches)) {
    foreach ($matches[1] as $match_key => $match_value) {
      if (isset($values[$match_value]))
        $value_replace = $values[$match_value];
      elseif (isset($values[$match_value]))
        $value_replace = $values[$match_value];
      elseif (isset($GLOBALS[$match_value]))
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