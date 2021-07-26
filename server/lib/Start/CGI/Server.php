<?php namespace Start\CGI;

use \Start\Server as WebServer;

class Server extends WebServer {

  protected array $menu = [];

  public function onGet(string $action, callable $service): self {
    return $this->request('GET', $action);
  }

  public function onPost(string $action, callable $service): self {
    return $this->request('POST', $action);
  }

  /**
   * On request server
   *
   * @param  string   $method  The request method
   * @param  string   $action  The request action
   * @param  callable $service The request service
   * @return self
   */
  public function onRequest(string $method, string $action, callable $service): self {
    $method = $this->sanitizeMethod($method);
    $this->menu[$method][$action] = $service;
    return $this;
  }

  protected function sanitizeMethod(string $method): string {
    return strtoupper(trim($method));
  }

  /**
   * @return array The server menu
   */
  public function menu(): array {
    return $this->menu;
  }

  /**
   * Serve a client request
   *
   * @param  string $method The request method
   * @param  string $action The request action
   * @return void
   */
  public function serve(string $method, string $action): void {
    $method = $this->sanitizeMethod($method);
    if(!empty($services = $this->menu[$method]))
      foreach($services as $action => $service)
        //...
  }
}
