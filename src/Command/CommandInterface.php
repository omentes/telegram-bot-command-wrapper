<?php

declare(strict_types=1);

namespace TelegramBot\CommandWrapper\Command;

use Longman\TelegramBot\Entities\ServerResponse;
use TelegramBot\CommandWrapper\Validator\ValidateCommand;

/**
 * Interface CommandInterface
 * @package TelegramBot\CommandWrapper\Command
 */
interface CommandInterface
{
    /**
     * @param ValidateCommand|null $validator
     *
     * @return $this
     */
    public function validate(?ValidateCommand $validator): CommandInterface;

    /**
     * @return $this
     */
    public function execute(): CommandInterface;

    /**
     * @return $this
     */
    public function postStackMessages(): CommandInterface;

    /**
     * @return ServerResponse
     */
    public function getResponseMessage(): ServerResponse;

    /**
     * @return bool
     */
    public function hasResponse(): bool;

    /**
     * @return array
     */
    public function showResponses(): array;
}
