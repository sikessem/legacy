<?php

namespace SIKessEm\Debugger;

use \ErrorException;

class ErrorHandler {
    public function __invoke(int $severity, string $message, string $file, int $line): bool {
        return throw new ErrorException($message, 0, $severity, $file, $line);
    }
}