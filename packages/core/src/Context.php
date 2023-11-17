<?php

declare(strict_types=1);

namespace Sikessem;

class Context
{
    protected Environment $environment;

    public function __construct(Environment $environment)
    {
        $this->setEnvironment($environment);
    }

    public function getEnvironment(): Environment
    {
        return $this->environment;
    }

    public function setEnvironment(Environment $environment): self
    {
        $this->environment = $environment;

        return $this;
    }
}