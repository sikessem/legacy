<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'init.php';

return function () {
  require __DIR__ . '/doc/home.php';
  exit;
};
