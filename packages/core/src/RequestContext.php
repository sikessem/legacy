<?php

declare(strict_types=1);

namespace Sikessem;

class RequestContext extends Context
{
    protected Request $request;
    protected Response $response;

    public function __construct(Request $request, Response $response, Environment $environment)
    {
        parent::__construct($environment);
        $this->setRequest($request);
        $this->setResponse($response);
    }

    public static function fromGlobals(): self
    {
        $request = Request::fromGlobals();
        $response = Response::fromGlobals();
        $environment = Environment::fromGlobals();
        return new self($request, $response, $environment);
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function setRequest(Request $request): self
    {
        $this->request = $request;

        return $this;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }

    public function setResponse(Response $response): self
    {
        $this->response = $response;

        return $this;
    }
}