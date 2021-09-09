<?php namespace Start\App;

abstract class App {
  public function __construct(Server $server) {
    $this->server = $server;
  }

  public function server(): Server {
    return $this->server;
  }
}
