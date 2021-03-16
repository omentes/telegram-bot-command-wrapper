<?php

declare(strict_types=1);

namespace TelegramBot\CommandWrapper\Command;

use TelegramBot\CommandWrapper\Service\EmptyCallbackService;

/**
 * Class CommandDirector
 * @package TelegramBot\CommandWrapper\Command
 */
class CommandDirector implements DirectorInterface
{
    /**
     * CommandDirector constructor.
     *
     * @param CommandOptions $options
     */
    public function __construct(protected CommandOptions $options)
    {
    }

    /**
     * @return CommandOptions
     */
    public function getOptions(): CommandOptions
    {
        return $this->options;
    }

    /**
     * @return CommandInterface
     */
    public function makeService(): CommandInterface
    {
        return match($this->getOptions()->getCommand()) {
            default => new EmptyCallbackService($this->getOptions()),
        };
    }
}
