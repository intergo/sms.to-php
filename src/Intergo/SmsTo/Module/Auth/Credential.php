<?php


namespace Intergo\SmsTo\Module\Auth;


use Intergo\SmsTo\Credentials\ICredential;
use Intergo\SmsTo\Http\Client;
use Intergo\SmsTo\Module\BaseModule;

class Credential extends BaseModule
{
    protected $url = 'https://auth.sms.to';

    public function getType(): string
    {
        return $this->credentials->getType();
    }

    public function verify(): ICredential
    {
        $this->credentials->verify();
        return $this->credentials;
    }

    public function getToken(): string
    {
        return $this->credentials->getToken();
    }

    public function getAuthHeader(): array
    {
        return $this->credentials->getAuthHeader();
    }

    public function refreshToken(): array
    {
        return $this->credentials->refreshToken();
    }

    public function getExpireTTL(): array
    {
        return $this->credentials->getExpireTTL();
    }

    public function getBalance()
    {
        if(!$this->credentials->getToken())
        {
            $this->credentials->verify();
        }
        $url = $this->url . '/api/balance';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }
}