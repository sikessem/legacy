<?php

declare(strict_types=1);

namespace Sikessem\Http;

class Protocol implements \Stringable
{
    protected string $scheme;

    protected float $version;

    public function __construct(string $value)
    {
        $this->setValue($value);
    }

    public function __toString(): string
    {
        return $this->getValue();
    }

    public static function fromGlobals(): self
    {
        return new self($_SERVER['SERVER_PROTOCOL'] ?? 'HTTP/1.1');
    }

    public function setValue(string $value): self
    {
        [$scheme, $version] = explode('/', $value, 2);

        $scheme = trim($scheme);
        $version = trim($version);

        $this->setScheme($scheme)->setVersion((float) $version);

        return $this;
    }

    public function getScheme(): string
    {
        return $this->scheme;
    }

    public function setScheme(string $scheme): self
    {
        $scheme = strtoupper($scheme);
        
        $this->scheme = $scheme;

        return $this;
    }

    public function getVersion(): float
    {
        return $this->version;
    }

    public function setVersion(float $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getValue(): string
    {
        return $this->getScheme() . '/' . $this->getVersion();
    }


}