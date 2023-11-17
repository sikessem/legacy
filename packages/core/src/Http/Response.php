<?php

declare(strict_types=1);

namespace Sikessem\Http;

use Sikessem\WritableStream;

class Response
{
    public function __construct(protected Status $status, protected Headers $headers, protected WritableStream $body, protected Protocol $protocol)
    {
    }

    public static function fromGlobals(): self
    {
        $status = Status::fromGlobals();
        $headers = Headers::fromGlobals();
        $body = WritableStream::fromGlobals();
        $protocol = Protocol::fromGlobals();

        return new self($status, $headers, $body, $protocol);
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getHeaders(): Headers
    {
        return $this->headers;
    }

    public function getBody(): WritableStream
    {
        return $this->body;
    }

    public function getProtocol(): Protocol
    {
        return $this->protocol;
    }

    public function setStatus(Status|int $status): self
    {
        $status = $status instanceof Status ? $status : new Status($status);

        $this->status = $status;

        return $this;
    }

    public function setHeaders(Headers|array $headers): self
    {
        $headers = is_array($headers) ? new Headers($headers) : $headers;

        $this->headers = $headers;

        return $this;
    }

    public function setBody(WritableStream $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function setProtocol(Protocol|string $protocol): self
    {
        $protocol = $protocol instanceof Protocol ? $protocol : new Protocol($protocol);

        $this->protocol = $protocol;

        return $this;
    }
}