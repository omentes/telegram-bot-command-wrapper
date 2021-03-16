<?php

declare(strict_types=1);

namespace TelegramBot\CommandWrapper\Validator;

use TelegramBot\CommandWrapper\Command\CommandOptions;

/**
 * Interface ValidateCommand
 * @package TelegramBot\CommandWrapper\Validator
 */
interface ValidateCommand
{
    /**
     * @param CommandOptions $options
     *
     * @return array
     */
    public function validate(CommandOptions $options): array;
}
