<?php

declare(strict_types=1);

namespace Sikessem;

class Command implements \Stringable
{
    protected array $arguments = [];

    protected int $count = 0;

    public function __construct(array $arguments = [], int $count = 0)
    {
        $this->setArguments($arguments)->setCount($count);
    }

    public function __toString(): string
    {
        return implode(' ', $this->getArguments());
    }

    public static function fromGlobals(): self
    {
        $argv = $_SERVER['argv'] ?? [];
        $argc = $_SERVER['argc'] ?? \count($argv);

        return new self($argv, $argc);
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }

    public function setArguments(array $arguments): self
    {
        $this->arguments = $arguments;
        $this->count = \count($arguments);

        return $this;
    }

    public function getArgument(int $index): mixed
    {
        return $this->arguments[$index] ?? null;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}
