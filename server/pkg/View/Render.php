<?php

namespace SIKessEm\View;

class Render {
    public function __construct(string $file, array $vars = [], ?callable $call = null) {
        $this->file = $file;
        $this->vars = $vars;
        $this->call = $call;
    }

    public function __toString(): string {
        extract($this->vars);
        ob_start($this->call);
        require $this->file;
        return ob_get_clean();
    }
}