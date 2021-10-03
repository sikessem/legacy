<?php

namespace SIKessEm\View;

use SIKessEm\OO\Is_Stringable;

class Render implements Is_Stringable {
    public function __construct(string $file, array $vars = [], ?callable $call = null) {
        if (!is_file($file))
            throw new Error("No such ", Error::NO_FILE);
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