<?php
namespace SIKessEm\Net\Web\HTTP;

use SIKessEm\OO\{Encapsulable, Encapsulator};

class Response implements Encapsulable {

  use Encapsulator;

  public function __construct(int $code) {
    $this->setCode($code);
  }

  protected int $code;

  public function getCode(): int {
    return $this->code;
  }

  public function setCode(int $code): static {
    $this->code = $code;
    return $this;
  }

  protected string $body;

  public function getBody(): string {
    return $this->body;
  }

  public function setBody(string $body): static {
    $this->body = $body;
    return $this;
  }
}