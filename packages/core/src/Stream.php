<?php

declare(strict_types=1);

namespace Sikessem;

class Stream
{
    protected $wrapper;

    public function __construct($wrapper)
    {
        $this->setWrapper($wrapper);
    }
    
    public function setWrapper($wrapper): self
    {
        if (! is_resource($wrapper)) {
            throw new \InvalidArgumentException('Wrapper must be a resource');
        }

        $this->wrapper = $wrapper;

        return $this;
    }

    public function getWrapper()
    {
        return $this->wrapper;
    }

    public function rewind(): static
    {
        rewind($this->getWrapper());

        return $this;
    }

    public function close(): static
    {
        fclose($this->getWrapper());

        return $this;
    }

    public function isClosed(): bool
    {
        return ! is_resource($this->getWrapper());
    }
}