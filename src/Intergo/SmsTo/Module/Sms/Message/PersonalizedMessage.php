<?php


namespace Intergo\SmsTo\Module\Sms\Message;


use Exception;

class PersonalizedMessage extends Message
{
    /**
     * @var array
     */
    public $messages;

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param array $messages
     */
    public function setMessages(array $messages)
    {
        $this->messages = $messages;
    }

    public function prepare(): array
    {
        $data = parent::prepare();
        if(!isset($data['messages'])) {
            throw new Exception('Recipient or Message is missing');
        }
        return $data;
    }
}