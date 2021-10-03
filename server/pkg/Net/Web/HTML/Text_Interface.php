<?php
namespace SIKessEm\Net\Web\HTML;

interface Text_Interface extends Node_Interface {
    public function setValue(string $value): static;
    public function getValue(): string;
}