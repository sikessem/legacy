<?php namespace Start\CGI;

use \Start\Server as WebServer;

class Server extends WebServer {

  protected array $menu = [];

  public function onGet(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('GET', $action, $callback, $name);
  }

  public function onPost(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('POST', $action, $callback, $name);
  }

  /**
   * @param  string      $method   The request method
   * @param  string      $action   The request action
   * @param  callable    $callback The request callback
   * @param  string|null $name    The request alias
   * @return Service
   */
  public function onRequest(string $method, string $action, callable $callback, ?string $name = null): Service {
    $method = $this->sanitizeMethod($method);
    $action = $this->sanitizeAction($action);
    if(!isset($name))
      $name = $action;
    return $this->menu[$method][] = new Service($action, $name, $callback);
  }

  protected function sanitizeMethod(string $method): string {
    return strtoupper(trim($method));
  }

  protected function sanitizeAction(string $action): string {
    return trim($action, '/');
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
    $action = $this->sanitizeAction($action);

    if(!isset($this->menu[$method]))
      throw new Error("No method matches $method", Error::BAD_METHOD);

    foreach($this->menu[$method] as $service) {
      if($service->match($action))
        $service->process();
    }

    throw new Error("No actions matches $action", Error::NO_ACTION);
  }
}
