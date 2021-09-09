<?php namespace Start\App\CGI;

use \Start\App\Server as GeneralServer;

class Server extends GeneralServer {

  public function onGet(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('GET', $action, $callback, $name);
  }

  public function onPost(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('POST', $action, $callback, $name);
  }

  public function onPut(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('PUT', $action, $callback, $name);
  }

  public function onPatch(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('PATCH', $action, $callback, $name);
  }

  public function onDelete(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('DELETE', $action, $callback, $name);
  }

  public function onCopy(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('COPY', $action, $callback, $name);
  }

  public function onHead(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('HEAD', $action, $callback, $name);
  }

  public function onOptions(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('OPTIONS', $action, $callback, $name);
  }

  public function onLink(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('LINK', $action, $callback, $name);
  }

  public function onUnlink(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('UNLINK', $action, $callback, $name);
  }

  public function onPurge(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('PURGE', $action, $callback, $name);
  }

  public function onLock(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('LOCK', $action, $callback, $name);
  }

  public function onUnlock(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('UNLOCK', $action, $callback, $name);
  }

  public function onPropfind(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('PROPFIND', $action, $callback, $name);
  }

  public function onView(string $action, callable $callback, ?string $name = null): Service {
    return $this->onRequest('VIEW', $action, $callback, $name);
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
      $name = is_string($callback)? $callback: $action;

    return $this->menu[$method][] = $this->services[$name] = new Service($action, $name, $callback);
  }

  protected function sanitizeMethod(string $method): string {
    return strtoupper(trim($method));
  }

  protected function sanitizeAction(string $action): string {
    return trim($action, '/');
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
