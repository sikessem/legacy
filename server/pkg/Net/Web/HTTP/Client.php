<?php
namespace SIKessEm\Net\Web\HTTP;

use SIKessEm\OO\{Encapsulable, Encapsulator};

class Client implements Encapsulable {
  use Encapsulator;

  public function __construct(protected Request $request) {}

  public function getRequest(): Request {
    return $this->request;
  }
}