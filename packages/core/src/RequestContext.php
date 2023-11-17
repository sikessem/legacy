<?php

declare(strict_types=1);

namespace Sikessem;

class RequestContext
{
    public function __construct(protected Request $request, protected Environment $environment)
    {
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

    public function getEnvironment(): Environment
    {
        return $this->environment;
    }

    public function setRequest(Request $request): self
    {
        $this->request = $request;

        return $this;
    }

    public function setEnvironment(Environment $environment): self
    {
        $this->environment = $environment;

        return $this;
    }
}