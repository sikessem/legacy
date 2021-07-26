<?php namespace Start\CGI;

use \Start\App as WebApp;

class App extends WebApp {
  public function __construct() {
    parent::__construct(new Server);
  }
}
