<?php
namespace SIKessEm\Net\Web\HTTP;

use SIKessEm\OO\{Encapsulable, Encapsulator};

class Request implements Encapsulable {

  use Encapsulator;

  public function __construct(string $method, string $uri, ?string $scheme = null) {
    $method = strtoupper($method);

    $path = parse_url($uri, PHP_URL_PATH);
    $path = preg_replace('/\/+/', '/', $path);
    $path = trim($path, '/');
    $this->path = $path;

    $query = parse_url($uri, PHP_URL_QUERY);
    parse_str($query, $this->query);

    if (isset($scheme))
      $this->secure = (stripos($scheme, 's') === (strlen($scheme) - 1));
    $this->scheme = $scheme;
  }

  protected bool $secure = false;

  protected string $method;

  protected string $path;

  protected array $query = [];

  protected ?string $scheme = null;

  public function __get(string $name): mixed {
    return $this->$name ?? null;
  }
}