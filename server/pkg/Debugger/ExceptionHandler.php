<?php

namespace SIKessEm\Debugger;

class ExceptionHandler {
    public function __invoke(\Throwable $e): void {
        echo new Debug($e);
        exit(1);
    }
}