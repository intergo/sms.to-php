<?php


namespace Intergo\SmsTo\Module\Sms\Message;


use Exception;

class CampaignMessage extends Message
{
    /**
     * @var array
     */
    public $to;

    /**
     * @var
     */
    public $message;

    public function prepare(): array
    {
        $data = parent::prepare();
        if(!isset($data['to'], $data['message'])) {
            throw new Exception('Recipient or Message is missing');
        }
        return $data;
    }

    /**
     * @return array
     */
    public function getTo(): array
    {
        return $this->to;
    }

    /**
     * @param array $to
     */
    public function setTo(array $to)
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
}