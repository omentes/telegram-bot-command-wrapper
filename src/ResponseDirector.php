<?php

declare(strict_types=1);

namespace TelegramBot\CommandWrapper;

use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;
use TelegramBot\CommandWrapper\Exception\SupportTypeException;

/**
 * Class ResponseDirector
 * @package TelegramBot\CommandWrapper
 */
class ResponseDirector implements ResponseInterface
{
    protected const SUPPORT_TYPES = [
        'sendMessage',
        'sendDocument',
        'sendVoice',
        'editMessageText',
        'answerCallbackQuery',
    ];
    
    /**
     * ResponseDirector constructor.
     *
     * @param string $type
     * @param array  $data
     *
     * @throws SupportTypeException
     */
    public function __construct(private string $type, private array $data)
    {
        if (!in_array($type, self::SUPPORT_TYPES)) {
            throw new SupportTypeException('ResponseDirector does not support this message type!');
        }
    }

    /**
     * @return ServerResponse
     * @throws TelegramException
     */
    public function getResponse(): ServerResponse
    {
        $data = $this->getData();

        return match($this->getType()) {
            'sendMessage'         => Request::sendMessage($data),
            'sendDocument'        => Request::sendDocument($data),
            'sendVoice'           => Request::sendVoice($data),
            'editMessageText'     => Request::editMessageText($data),
            'answerCallbackQuery' => Request::answerCallbackQuery($data),
            'sendToActiveChats'   => Request::answerCallbackQuery($data),
        };
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
