<?php

declare(strict_types=1);

namespace TelegramBot\CommandWrapper\Service;

use TelegramBot\CommandWrapper\Command\BaseDefaultCommandService;
use TelegramBot\CommandWrapper\Command\CommandInterface;
use TelegramBot\CommandWrapper\Exception\SupportTypeException;
use TelegramBot\CommandWrapper\ResponseDirector;

/**
 * Class EmptyCallbackService
 * @package TelegramBot\CommandWrapper\Service
 */
class EmptyCallbackService extends BaseDefaultCommandService
{
    /**
     * {@inheritDoc}
     * @throws SupportTypeException
     */
    public function execute(): CommandInterface
    {
        $this->setResponse(
            new ResponseDirector(
                'answerCallbackQuery',
                [
                    'callback_query_id' => $this->getOptions()->getCallbackQueryId(),
                    'text'              => '',
                    'show_alert'        => true,
                    'cache_time'        => 3,
                ]
            )
        );

        return $this;
    }
}
