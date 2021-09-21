<?php
namespace SIKessEm\Net\Web\HTML;

trait Element_Trait {
    use Name_Trait, AttributesList_Trait;

    protected ?string $content;

    public function setContent(?string $content): static {
        $this->content = $content;
        return $this;
    }

    public function getContent(): ?string {
        return $this->content;
    }

    public function hasContent(): bool {
        return isset($this->content);
    }

    public function render(): string {
        $render = "<{$this->getName()}";
        if ($this->hasAttributes())
            foreach ($this->getAttributes() as $attribute)
                $render .= ' ' . $attribute;
        if($this->hasContent()) {
            $render .= ">{$this->getContent()}</{$this->getName()}>";
        } else
            $render .= '/>';
        return $render;
    }
}