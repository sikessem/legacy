<?php namespace Start\CGI;

use \Start\Server as WebServer;

class Server extends WebServer {

  protected array $menu = [];

  public function onGet(callable $action): self {
    return $this->request('GET', $action);
  }

  public function onPost(callable $action): self {
    return $this->request('POST', $action);
  }

  /**
   * On request server
   *
   * @param  string   $method The request method
   * @param  callable $action The request action
   * @return self
   */
  public function onRequest(string $method, callable $action): self {
    $method = strtoupper(trim($method));
    $this->menu[$method] = $action;
    return $this;
  }

  /**
   * @return array The server menu
   */
  public function menu(): array {
    return $this->menu;
  }
}
