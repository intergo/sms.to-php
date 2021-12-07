<?php


namespace Intergo\SmsTo\Module\Sms\Message;


use Exception;

class ListMessage extends Message
{
    public $list_id;

    /**
     * @return array
     */
    public function getListId(): array
    {
        return $this->list_id;
    }

    /**
     * @param $listId
     */
    public function setListId($listId)
    {
        $this->list_id = $listId;
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

    /**
     * @var
     */
    public $message;

    public function prepare(): array
    {
        $data = parent::prepare();
        if(!isset($data['list_id'], $data['message'])) {
            throw new Exception('Recipient or Message is missing');
        }
        return $data;
    }
}