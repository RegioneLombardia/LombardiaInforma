<?php

/*
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 */

namespace Symfony\Component\Console\Event;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Allows to inspect input and output of a command.
 *
 */
class ConsoleEvent extends Event
{
    protected $command;

    private $input;
    private $output;

    public function __construct(Command $command = null, InputInterface $input, OutputInterface $output)
    {
        $this->command = $command;
        $this->input = $input;
        $this->output = $output;
    }

    /**
     * Gets the command that is executed.
     *
     * @return Command|null A Command instance
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Gets the input instance.
     *
     * @return InputInterface An InputInterface instance
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * Gets the output instance.
     *
     * @return OutputInterface An OutputInterface instance
     */
    public function getOutput()
    {
        return $this->output;
    }
}
