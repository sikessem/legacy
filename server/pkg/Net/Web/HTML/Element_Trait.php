<?php
namespace SIKessEm\Net\Web\HTML;

trait Element_Trait {
    use Component_Trait, Name_Trait;

    protected ?string $content = null;

    public function setContent(null|string|Element_Interface|array $content): static {
        if(is_array($content))
            return $this->setElements($content);
        
        if(is_object($content))
            return $this->setElement($content);
        
        if(is_string($content))
            return $this->setText($content);

        $this->content = $content;
        return $this;
    }

    public function setElements(array $elements): static {
        $this->content = '';
        foreach ($elements as $element)
            if (is_array($element)) $this->addElements($element);
            else is_string($element) ? $this->addText($element) : $this->addElement($element);
        return $this;
    }

    public function addElements(array $elements): static {
        foreach ($elements as $element)
            $this->addElement($element);
        return $this;
    }

    public function setElement(Element_Interface $element): static {
        return $this->setText((string) $element);
    }

    public function addElement(Element_Interface $element): static {
        return $this->addText((string) $element);
    }

    public function setText(string $text): static {
        $this->content = $text;
        return $this;
    }

    public function addText(string $text): static {
        $this->content .= $text;
        return $this;
    }

    public function getContent(): ?string {
        return $this->content;
    }

    public function hasContent(): bool {
        return isset($this->content);
    }

    protected ?Attributes_Interface $attributes = null;

    public function setAttributes(array|Attributes_Interface|Attribute_Interface $attributes): static {
        isset($this->attributes) ? $this->attributes->set($attributes) : ($this->attributes = new Final_Attributes($attributes));
        return $this;
    }

    public function getAttributes(null|array|Attributes_Interface $attributes = null): null|array|Attributes_Interface {
        return isset($attributes) ? $this?->attributes->get($attributes) : $this->attributes;
    }

    public function hasAttributes(null|array|Attributes_Interface $attributes = null): bool {
        return (bool) isset($attributes) ? $this?->attributes->isset($attributes) : ((int) $this?->attributes->count()) > 0;
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