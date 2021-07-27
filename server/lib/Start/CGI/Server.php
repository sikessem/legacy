<?php namespace Start\CGI;

use \Start\Server as GeneralServer;

class Server extends GeneralServer {

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

    return $this->menu[$method][] = $this->services[$name] = new Service($action, $name, $callback);
  }

  protected function sanitizeMethod(string $method): string {
    return strtoupper(trim($method));
  }

  protected function sanitizeAction(string $action): string {
    return trim($action, '/');
  }

  protected array $menu = [];

  /**
   * @return array The server menu
   */
  public function menu(): array {
    return $this->menu;
  }

  protected array $services = [];

  /**
   * Get a service by name
   *
   * @param  string $name The service name
   * @return Service|null The service or null
   */
  public function service(string $name): ?Service {
    return $this->services[$name] ?? null;
  }

  /**
   * Serve a client request
   *
   * @param  string $method The request method
   * @param  string $action The request action
   * @throws Error          If undefined method or action
   * @return void
   */
  public function serve(string $method, string $action): void {
    $method = $this->sanitizeMethod($method);
    $action = $this->sanitizeAction($action);

    if(!isset($this->menu[$method]))
      throw new Error("No method matches $method", Error::BAD_METHOD);

    foreach($this->menu[$method] as $service)
      if($service->match($action))
        $service->call();

    throw new Error("No action matches $action", Error::NO_ACTION);
  }
}
