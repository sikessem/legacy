<?php
namespace SIKessEm\Net\Web\HTML;

interface Element_Interface extends Name_Interface, AttributesList_Interface {
    public function setContent(?string $content): static;
    public function getContent(): ?string;
    public function hasContent(): bool;
}