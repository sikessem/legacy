<?php namespace Start\App\CGI;

use \Start\App\App as GeneralApp;

class App extends GeneralApp {
  public function __construct() {
    parent::__construct(new Server);
  }
}
