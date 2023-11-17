<?php

declare(strict_types=1);

namespace Sikessem;

class Request
{
    public function __construct(protected Method $method, protected Url $url, protected Headers $headers, protected ReadableStream $body, protected Protocol $protocol)
    {
    }

    public static function fromGlobals(): self
    {
        $url = Url::fromGlobals();
        $url->setScheme(Scheme::fromGlobals());
        $url->setQuery(Query::fromGlobals());
        $method = Method::fromGlobals();
        $headers = Headers::fromGlobals();
        $body = ReadableStream::fromGlobals();
        $protocol = Protocol::fromGlobals();

        return new self($method, $url, $headers, $body, $protocol);
    }

    public function getMethod(): Method
    {
        return $this->method;
    }

    public function getUrl(): Url
    {
        return $this->url;
    }

    public function getHeaders(): Headers
    {
        return $this->headers;
    }

    public function getBody(): ReadableStream
    {
        return $this->body;
    }

    public function getProtocol(): Protocol
    {
        return $this->protocol;
    }

    public function setMethod(Method|string $method): self
    {
        $method = $method instanceof Method ? $method : new Method($method);

        $this->method = $method;

        return $this;
    }

    public function setUrl(Url|string $url): self
    {
        $url = $url instanceof Url ? $url : new Url($url);

        $this->url = $url;

        return $this;
    }

    public function setHeaders(Headers|array $headers): self
    {
        $headers = is_array($headers) ? new Headers($headers) : $headers;

        $this->headers = $headers;

        return $this;
    }

    public function setBody(ReadableStream $body): self
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
