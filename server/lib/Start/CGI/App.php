<?php namespace Start\CGI;

use \Start\App as GeneralApp;

class App extends GeneralApp {
  public function __construct() {
    parent::__construct(new Server);
  }
}
