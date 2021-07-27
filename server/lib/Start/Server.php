<?php namespace Start;

abstract class Server {

  protected array $menu = [];

  /**
   * @return array The server menu
   */
  public function menu(): array {
    return $this->menu;
  }

  protected array $services = [];

  public function services(): array {
    return $this->services;
  }

  /**
   * Get a service by name
   *
   * @param  string $name The service name
   * @throws Error        If service not found
   * @return Service      The service
   */
  public function service(string $name): ?Service {
    if(!isset($this->services[$name]))
      throw new Error("Undefined service $name", Error::NO_SERVICE);
    return $this->services[$name] ?? null;
  }
}
