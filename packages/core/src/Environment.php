<?php

declare(strict_types=1);

namespace Sikessem;

class Environment
{
    public function __construct(protected array $parameters = [])
    {
    }

    public static function fromGlobals(): self
    {
        $parameters = [];

        $parameters['PATH'] = getenv('PATH') ?: getenv('Path') ?: '';
        $parameters['PATHEXT'] = getenv('PATHEXT') ?: getenv('PathExt') ?: '';
        foreach ($_SERVER as $key => $value) {
            if (isset($_ENV[$key]) || getenv($key) !== false) {
                $parameters[$key] = $value;
            }
        }

        return new self($parameters);
    }
}
