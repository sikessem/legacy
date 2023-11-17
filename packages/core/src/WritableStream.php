<?php

declare(strict_types=1);

namespace Sikessem;

class WritableStream extends Stream
{
    public static function fromGlobals(): self
    {
        return new self(fopen('php://output', 'w'));
    }

    public function write(string $data, ?int $length = null): int
    {
        return fwrite($this->getWrapper(), $data, $length);
    }

    public function writeLine(string $data): int
    {
        return $this->write($data . PHP_EOL);
    }

    public function writeChar(string $data): int
    {
        return $this->write(substr($data, 0, 1));
    }

    public function print(string $format, mixed ...$values): int
    {
        return fprintf($this->getWrapper(), $format, ...$values);
    }
}