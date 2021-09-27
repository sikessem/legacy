<?php

namespace SIKessEm\View;

class Template {
    public function __construct(string $dir) {
        $this->dir = $dir;
    }

    public function render(string $name, array $vars = [], ?callable $call = null): Render {
        return new Render($this->dir . DIRECTORY_SEPARATOR . $name . '.php', $vars, $call);
    }
}