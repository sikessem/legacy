<?php

declare(strict_types=1);

namespace Sikessem;

class Method implements \Stringable
{
    public const GET = 'GET';

    public const POST = 'POST';

    public const PUT = 'PUT';

    public const PATCH = 'PATCH';

    public const DELETE = 'DELETE';

    public const OPTIONS = 'OPTIONS';

    public const HEAD = 'HEAD';

    public const CONNECT = 'CONNECT';

    public const TRACE = 'TRACE';

    public const ALL = [
        self::GET,
        self::POST,
        self::PUT,
        self::PATCH,
        self::DELETE,
        self::OPTIONS,
        self::HEAD,
        self::CONNECT,
        self::TRACE,
    ];

    protected string $value;

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
        return new self($_SERVER['REQUEST_METHOD'] ?? 'GET');
    }

    public function setValue(string $value): self
    {
        $value = strtoupper($value);

        if (!\in_array($value, self::ALL, true)) {
            throw new \InvalidArgumentException('Invalid method: ' . $value);
        }

        $this->value = $value;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
