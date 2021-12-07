<?php


namespace Intergo\SmsTo\Module\NumberLookup;


use Intergo\SmsTo\Credentials\ICredential;
use Intergo\SmsTo\Http\Client;
use Intergo\SmsTo\Module\BaseModule;

class NumberLookup extends BaseModule
{
    protected $url = 'https://sms.to';

    public function estimate(string $phone)
    {
        $data = ['to' => $phone];
        $url = $this->url . '/' . $this->apiVersion . '/verify/number/estimate';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->post($url, $data)->json(true);
    }

    public function verify(string $phone)
    {
        $data = ['to' => $phone];
        $url = $this->url . '/' . $this->apiVersion . '/verify/number';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->post($url, $data)->json(true);
    }
}