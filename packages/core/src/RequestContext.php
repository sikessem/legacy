<?php

declare(strict_types=1);

namespace Sikessem;

class RequestContext extends Context
{
    protected Request $request;

    public function __construct(Request $request, Environment $environment)
    {
        parent::__construct($environment);
        $this->setRequest($request);
    }

    public static function fromGlobals(): self
    {
        $request = Request::fromGlobals();
        $environment = Environment::fromGlobals();
        return new self($request, $environment);
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
}