<?php


namespace Intergo\SmsTo\Module\Sms;


use Exception;
use Intergo\SmsTo\Credentials\ICredential;
use Intergo\SmsTo\Http\Client;
use Intergo\SmsTo\Module\BaseModule;
use Intergo\SmsTo\Module\Sms\Message\IMessage;

class Sms extends BaseModule
{
    protected $url = 'https://api.sms.to';

    private $type = 'sms';

    private $allowed_types = ['sms', 'fsms', 'viber'];

    public function estimate(IMessage $message)
    {
        $data = $message->prepare();
        $url = $this->url . '/' . $this->type . '/estimate';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->post($url, $data)->json(true);
    }

    public function send(IMessage $message)
    {
        $data = $message->prepare();
        $url = $this->url . '/' . $this->type . '/send';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->post($url, $data)->json(true);
    }

    public function getCampaigns()
    {
        $url = $this->url . '/campaigns';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    public function getLastCampaign()
    {
        $url = $this->url . '/last/campaign';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    public function getCampaignByID(string $id)
    {
        $url = $this->url . '/campaigns/' . $id;
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    public function getMessages()
    {
        $url = $this->url . '/messages';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    public function getLastMessage()
    {
        $url = $this->url . '/last/message';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    public function getMessageByID(string $id)
    {
        $url = $this->url . '/message/' . $id;
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    /**
     * @throws Exception
     */
    public function setType(string $type)
    {
        if(!in_array($type, $this->allowed_types))
        {
            throw new Exception("Invalid Type. Provide appropriate type: sms, fsms or viber");
        }
        $this->type = $type;
    }
}