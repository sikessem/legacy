<?php

namespace SIKessEm\View;

class Template {
    public function __construct(string $dir) {
        $this->dir = $dir;
    }

    public function render(string $name, array $vars = [], ?callable $callback = null): string {
        extract($vars);
        ob_start($callback);
        require "$this->dir/$name.php";
        return ob_get_clean();
    }
}