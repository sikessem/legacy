<?php

namespace SIKessEm\Debugger;

use SIKessEm\Error\Throwable;

class Debug implements \Stringable {
    public function __construct(protected Throwable $e) {}

    public function __toString(): string {
        $render = '<DOCTYPE html><html lang="en_US"><head><title>Exception thrown</title></head><body><main>';
        $e = $this->e;
        while ($e) {
            $render .= '<div class="e">';
            $render .= '<h1 class="e-name">' . get_class($e) . '</h1>';
            $render .= '<p class="e-info">Thrown with code <b>' . $e->getCode() . '</b> and message <q>' . $e->getMessage() . '</q> in the file <b class="file">' . $e->getFile() . '</b> on line <b class="line">' . $e->getLine() . '</b></u></p>';
            foreach ($e->getTrace() as $trace) {
                $render .= '<div class="e-trace"><p>Trace in the file <b class="file">' . $trace['file'] . '</b> on line <b class="line">' . $trace['line'] . '</b></p></div>';
            }
            $render .= '</div>';
            $e = $e->getPrevious();
        }
        return $render . '</main></body></html>';
    }
}