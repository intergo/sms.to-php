<?php


namespace Intergo\SmsTo\Module;


use Intergo\SmsTo\Credentials\ICredential;

class BaseModule
{
    /**
     * @var ICredential
     */
    protected $credentials;

    protected $url;

    protected $apiVersion = 'v1';

    public function __construct(ICredential $credentials)
    {
        $this->credentials = $credentials;
    }

    public function setBaseUrl(string $url)
    {
        $this->url = $url;
        $this->credentials->setBaseUrl($url);
    }

    public function setApiVersion(string $apiVersion)
    {
        $this->apiVersion = $apiVersion;
    }

    public function getCredentials(): ICredential
    {
        return $this->credentials;
    }
}