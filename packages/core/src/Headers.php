<?php

declare(strict_types=1);

namespace Sikessem;

class Headers implements \Stringable
{
    protected array $fields = [];

    public function __construct(array $fields = [])
    {
        $this->setFields($fields);
    }

    public function __toString(): string
    {
        return $this->getLines();
    }

    public static function fromGlobals(): self
    {
        return new self(function_exists('getallheaders') ? getallheaders() : $_SERVER);
    }

    public function setFields(array $fields): self
    {
        foreach ($fields as $name => $value) {
            $this->setField($name, $value);
        }

        return $this;
    }

    public function setField(string $name, string|array $value): self
    {
        $name = self::parseField($name);

        $this->fields[$name] = $value;

        return $this;
    }

    public function addField(string $name, string|array $value): self
    {
        $name = self::parseField($name);

        $value = (array) $value;

        $this->fields[$name] = isset($this->fields[$name])
        ? [$this->fields[$name], ...$value]
        : $value;

        return $this;
    }

    public function removeField(string $name): self
    {
        unset($this->fields[$name]);

        return $this;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function getField(string $name): null|string|array
    {
        return $this->fields[$name] ?? null;
    }

    public function hasField(string $name): bool
    {
        return isset($this->fields[$name]);
    }

    public function removeFields(): self
    {
        $this->fields = [];

        return $this;
    }

    public function setLines(string $lines): self
    {
        $lines = preg_split('/\r?\n/', $lines) ?: [];

        foreach ($lines as $line) {
            $this->setLine($line);
        }

        return $this;
    }

    public function setLine(string $line): self
    {
        $line = trim($line);
        $lineParts = preg_split('/\s*:\s*/', $line, 2);
        if (count($lineParts) == 2) {
            list($name, $value) = $lineParts;

            $this->setField($name, $value);
        }

        return $this;
    }
    
    public function getLines(): string
    {
        $lines = '';

        foreach ($this->getFields() as $name => $value) {
            $lines .= self::formatLine($name, $value);
        }

        return $lines;
    }

    public function getLine(string $name): string
    {
        return self::formatLine($name, $this->getField($name));
    }

    public static function parseField(string $field): string
    {
        if (\str_starts_with(strtoupper($field), 'HTTP_')) {
            $field = \substr($field, 5);
        }

        return str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', $field))));
    }

    public static function formatLine(string $name, string|array $value): string
    {
        $line = '';

        if (\is_array($value)) {
            foreach ($value as $item) {
                $line .= "{$name}: {$item}" . PHP_EOL;
            }
        } else {
            $line .= "{$name}: {$value}" . PHP_EOL;
        }

        return $line;
    }
}
