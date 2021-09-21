<?php
namespace SIKessEm\Net\Web\HTML;

trait Component_Trait {

    abstract public function render(): string;

    public function __toString(): string {
        return $this->render();
    }
}