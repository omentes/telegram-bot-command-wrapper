<?php

declare(strict_types=1);

namespace TelegramBot\CommandWrapper;

use Longman\TelegramBot\Entities\ServerResponse;

/**
 * Class ResponseInterface
 * @package TelegramBot\CommandWrapper
 */
interface ResponseInterface
{
    /**
     * ResponseDirector constructor.
     *
     * @param string $type
     * @param array  $data
     */
    public function __construct(string $type, array $data);

    /**
     * @return ServerResponse
     */
    public function getResponse(): ServerResponse;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return array
     */
    public function getData(): array;
}
