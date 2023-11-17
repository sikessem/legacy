<?php

declare(strict_types=1);

namespace Sikessem\Http;

class Query implements \Stringable
{
    protected array $parameters = [];

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
        return new self($_SERVER['QUERY_STRING'] ?? '');
    }

    public function setValue(string $value): self
    {
        parse_str($value, $this->parameters);

        return $this;
    }

    public function getValue(): string
    {
        return http_build_query($this->parameters);
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function setParameters(array $parameters): self
    {
        $this->parameters = $parameters;

        return $this;
    }

    public function setParameter(string $key, mixed $value): self
    {
        $this->parameters[$key] = $value;

        return $this;
    }

    public function getParameter(string $key): mixed
    {
        return $this->parameters[$key] ?? null;
    }

    public function hasParameter(string $key): bool
    {
        return isset($this->parameters[$key]);
    }

    public function removeParameter(string $key): self
    {
        unset($this->parameters[$key]);

        return $this;
    }

    public function hasParameters(): bool
    {
        return ! empty($this->parameters);
    }

    public function removeParameters(): self
    {
        $this->parameters = [];

        return $this;
    }
}
