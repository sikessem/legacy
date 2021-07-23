<?php
define('ROOT_DIR', dirname(__DIR__) . DIRECTORY_SEPARATOR);

define('CLIENT_DIR', ROOT_DIR . 'client' . DIRECTORY_SEPARATOR);

define('SERVER_DIR', ROOT_DIR . 'server' . DIRECTORY_SEPARATOR);

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

require_once ROOT_DIR . 'vendor/autoload.php';

return (function(){
$opts = (array) @include __DIR__ . '/cfg/program.php';
foreach($opts as $opt_id => &$opt_val) {
  if(preg_match_all('/\<\?\s*(.+?)\s*\?\>/', $opt_val, $opt_matches)) {
    foreach($opt_matches[1] as $opt_match_key => $opt_match_val) {
      if(isset($opts[$opt_match_val])) {
        $opt_val_replace = $opts[$opt_match_val];
      } elseif(isset($GLOBALS[$opt_match_val])) {
        $opt_val_replace = $GLOBALS[$opt_match_val];
      } elseif (defined($opt_match_val)) {
        $opt_val_replace = constant($opt_match_val);
      } else {
        $opt_val_replace = $opt_matches[0][$opt_match_key];
      }
      $opt_val = str_replace($opt_matches[0][$opt_match_key], $opt_val_replace, $opt_val);
    }
  }
}
return $opts;
})();
