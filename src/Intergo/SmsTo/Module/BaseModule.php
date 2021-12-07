<?php


namespace Intergo\SmsTo\Module;


use Intergo\SmsTo\Credentials\ICredential;

/**
 * Class BaseModule
 * @package Intergo\SmsTo\Module
 */
class BaseModule
{
    /**
     * @var ICredential
     */
    protected $credentials;

    /**
     * @var
     */
    protected $url;

    /**
     * @var string
     */
    protected $apiVersion = 'v1';

    /**
     * BaseModule constructor.
     * @param ICredential $credentials
     */
    public function __construct(ICredential $credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * @param string $url
     */
    public function setBaseUrl(string $url)
    {
        $this->url = $url;
        $this->credentials->setBaseUrl($url);
    }

    /**
     * @param string $apiVersion
     */
    public function setApiVersion(string $apiVersion)
    {
        $this->apiVersion = $apiVersion;
    }

    /**
     * @return ICredential
     */
    public function getCredentials(): ICredential
    {
        return $this->credentials;
    }
}