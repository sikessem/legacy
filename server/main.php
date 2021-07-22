<?php

return function (array $args) {
  extract($args);
  if($_SERVER['REQUEST_SCHEME'] === $app_scheme) {
    if($_SERVER['HTTP_HOST'] === $app_host) {
      if(in_array($_SERVER['REQUEST_METHOD'], ['GET', 'POST'], true)) {
        if(in_array(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), ['/', ''])) {
          http_response_code(200);
          require __DIR__ . '/src/cgi/home.php';
          exit;
        } else http_response_code(404);
      } else http_response_code(405);
    } else http_response_code(400);
  } else {
    header("Location: $app_scheme://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}", true, 301);
    exit;
  }
};
