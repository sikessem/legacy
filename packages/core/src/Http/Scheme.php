<?php

declare(strict_types=1);

namespace Sikessem\Http;

class Scheme implements \Stringable
{
    protected string $value;

    protected bool $secure;

    public function __construct(string $value, bool $secure = false)
    {
        $this->setValue($value)->setSecure($secure);
    }

    public function __toString(): string
    {
        return $this->getValue();
    }

    public static function fromGlobals(): self
    {
        return new self($_SERVER['REQUEST_SCHEME'] ?? 'http', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on');
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setSecure(bool $secure): self
    {
        $this->secure = $secure;

        return $this;
    }

    public function isSecure(): bool
    {
        return $this->secure;
    }
}