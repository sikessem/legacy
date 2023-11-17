<?php

declare(strict_types=1);

namespace Sikessem;

class CommandContext extends Context
{
    protected Command $command;

    public function __construct(Command $command, Environment $environment)
    {
        parent::__construct($environment);
        $this->setCommand($command);
    }

    public static function fromGlobals(): self
    {
        $command = Command::fromGlobals();
        $environment = Environment::fromGlobals();
        return new self($command, $environment);
    }

    public function getCommand(): Command
    {
        return $this->command;
    }

    public function setCommand(Command $command): self
    {
        $this->command = $command;

        return $this;
    }
}