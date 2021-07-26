<?php namespace Start\CGI;

use \Start\Server as WebServer;

class Server extends WebServer {

  protected array $menu = [];

  public function onGet(string $action, callable $service, ?string $alias = null): Service {
    return $this->request('GET', $action, $alias);
  }

  public function onPost(string $action, callable $service, ?string $alias = null): Service {
    return $this->request('POST', $action, $alias);
  }

  /**
   * @param  string      $method   The request method
   * @param  string      $action   The request action
   * @param  callable    $callback The request callback
   * @param  string|null $alias    The request alias
   * @return Service
   */
  public function onRequest(string $method, string $action, callable $callback, ?string $alias = null): Service {
    $method = $this->sanitizeMethod($method);
    if(!isset($alias))
      $alias = $action;
    return $this->menu[$method][$action] = new Service($action, $alias, $callback);
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
    if(!isset($this->menu[$method]))
      throw new Error("No method matches $method", Error::BAD_METHOD);

    foreach($services as $action => $service)
      if($service->match($action))
        return $service->process();
    throw new Error("No actions matches $action", Error::NO_ACTION);
  }
}
