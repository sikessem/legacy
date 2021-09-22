<?php
namespace SIKessEm\Net\Web\HTML;

trait Document_Trait {
    use Component_Trait;

    protected string $type;

    protected function setType(string $type): static {
        $this->type = $type;
        return $this;
    }

    public function getType(): string {
        return $this->type;
    }

    protected Element_Interface $root;
    
    protected function setRoot(Element_Interface $root): Element_Interface {
        return $this->root = $root;
    }

    public function getRoot(): Element_Interface {
        return $this->root;
    }

    public function render(): string {
        return "<!DOCTYPE {$this->getType()}>" . $this->getRoot();
    }
}