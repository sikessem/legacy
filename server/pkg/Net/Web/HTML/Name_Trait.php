<?php
namespace SIKessEm\Net\Web\HTML;

trait Name_Trait {
    protected string $name;

    protected function setName(string $name): static {
        $name = Filter::sanitize($name);
        if (!Filter::validate($name))
            throw new Error("Invalid attribute name $name give", Error::INVALID_NAME);
        $this->name = $name;
        return $this;
    }

    public function getName(): string {
        return $this->name;
    }

    public function is(string $name): bool {
        return $this->name === Filter::sanitize($name);
    }
}