<?php

declare(strict_types=1);

namespace TelegramBot\CommandWrapper\Command;

use TelegramBot\CommandWrapper\Service\EmptyCallbackService;

/**
 * Class DirectorInterface
 * @package TelegramBot\CommandWrapper\Command
 */
interface DirectorInterface
{
    /**
     * DirectorInterface constructor.
     *
     * @param CommandOptions $options
     */
    public function __construct(CommandOptions $options);

    /**
     * @return CommandOptions
     */
    public function getOptions(): CommandOptions;

    /**
     * @return CommandInterface
     */
    public function makeService(): CommandInterface;
}
