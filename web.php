<?php
/**
 * The SIKessEm website
 *
 * @package SIKessEm
 * @author  SIGUI Kessé Emmanuel <sikessem@omninf.com> (https://sikessem.com)
 * @license GPL-3.0-only
 */

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test an SIKessEm
// application without having installed a "real" web server software here.

$path = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if($path !== '/' && file_exists(__DIR__ . '/client' . $path)) return false;

require_once __DIR__ . '/client/index.php';
