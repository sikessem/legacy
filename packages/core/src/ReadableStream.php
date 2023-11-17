<?php

declare(strict_types=1);

namespace Sikessem;

class ReadableStream extends Stream
{
    public static function fromGlobals(): self
    {
        return new self(fopen('php://input', 'r'));
    }

    public function getContents(?int $length = null, int $offset = -1): string
    {
        return stream_get_contents($this->getWrapper(), $length, $offset);
    }

    public function getMetadata(): array
    {
        return stream_get_meta_data($this->getWrapper());
    }

    public function readLine(?int $length = null): string|false
    {
        return fgets($this->getWrapper(), $length);
    }

    public function readChar(): string|false
    {
        return fgetc($this->getWrapper());
    }

    public function read(int $length): string|false
    {
        return fread($this->getWrapper(), $length);
    }

    public function scan(string $format, mixed &...$args): array|int|false|null
    {
        return fscanf($this->getWrapper(), $format, ...$args);
    }
}