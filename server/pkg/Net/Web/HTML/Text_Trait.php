<?php
namespace SIKessEm\Net\Web\HTML;

trait Text_Trait {
    use Node_Trait;

    protected string $value;

    public function setValue(string $value): static {
        $this->value = $value;
        return $this;
    }

    public function getValue(): string {
        return $this->value;
    }

    public function render(): string {
        return $this->value;
    }
}