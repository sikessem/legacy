<?php
define('ROOT_DIR', dirname(__DIR__) . DIRECTORY_SEPARATOR);

define('CLIENT_DIR', ROOT_DIR . 'client' . DIRECTORY_SEPARATOR);

define('SERVER_DIR', ROOT_DIR . 'server' . DIRECTORY_SEPARATOR);

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
