<?php
namespace SIKessEm\Net\Web\HTML;

interface Element_Interface extends Name_Interface, Attributes_Interface {
    public function setContent(null|string|Element_Interface|array $content): static;
    public function setElements(array $elements): static;
    public function addElements(array $elements): static;
    public function setElement(Element_Interface $element): static;
    public function addElement(Element_Interface $element): static;
    public function setText(string $text): static;
    public function addText(string $text): static;
    public function getContent(): ?string;
    public function hasContent(): bool;
}