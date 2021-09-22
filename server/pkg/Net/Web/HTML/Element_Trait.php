<?php
namespace SIKessEm\Net\Web\HTML;

trait Element_Trait {
    use Name_Trait, Attributes_Trait;

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