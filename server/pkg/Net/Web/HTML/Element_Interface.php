<?php
namespace SIKessEm\Net\Web\HTML;

interface Element_Interface extends Name_Interface {
    public function setContent(null|string|Element_Interface|array $content): static;
    public function setElements(array $elements): static;
    public function addElements(array $elements): static;
    public function setElement(Element_Interface $element): static;
    public function addElement(Element_Interface $element): static;
    public function setText(string $text): static;
    public function addText(string $text): static;
    public function getContent(): ?string;
    public function hasContent(): bool;
    public function setAttributes(array|Attributes_Interface|Attribute_Interface $attributes): static;
    public function getAttributes(null|array|Attributes_Interface $attributes = null): null|array|Attributes_Interface;
    public function hasAttributes(null|array|Attributes_Interface $attributes = null): bool;
}