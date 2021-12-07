<?php


namespace Intergo\SmsTo\Module\Sms\Message;


use Exception as Exception;

class SingleMessage extends Message
{
    /**
     * @var string
     */
    public $to;

    /**
     * @var string
     */
    public $message;

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo(string $to)
    {
        $this->to = $to;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function prepare(): array
    {
        $data = parent::prepare();
        if(!isset($data['to'], $data['message'])) {
            throw new Exception('Recipient or Message is missing');
        }
        return $data;
    }
}