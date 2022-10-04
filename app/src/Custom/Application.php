<?php

namespace Sikessem\Custom;

class Application {
    protected static ?self $INSTANCE = null;

    private function __construct(string $root) {
        $this->setRoot($root);
    }

    protected string $root;

    public function setRoot(string $root): self {
        if (!\is_dir($root)) {
            throw new \InvalidArgumentException("$root is not a directory");
        }
        $this->root = realpath($root).DIRECTORY_SEPARATOR;
        return $this;
    }

    public function getRoot(): string {
        return $this->root;
    }
    
    public static function main(?string $root = null): static {
        if (!isset(self::$INSTANCE)) {
            if (!isset($root)) {
                $root = dirname(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0]['file']);
            }
            self::$INSTANCE = new self($root);
        }
        return self::$INSTANCE;
    }

    public function run(): void {
        if (\in_array(\php_sapi_name(), ['cli', 'phpdbg'])) {
            echo "Running CLI application from $this->root" . PHP_EOL;
        }
        else {
            echo "Running Web application from $this->root<br/>";
        }
    }
}