<?php


namespace Intergo\SmsTo\Credentials;


use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Intergo\SmsTo\Http\Client;

class OauthCredential implements ICredential
{
    /**
     * @var string
     */
    private $type = 'oauth';

    /**
     * @var string
     */
    private $url = 'https://auth.sms.to';

    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $secret;

    /**
     * @var mixed|null
     */
    private $expiresIn;

    /**
     * @var string
     */
    private $accessToken = '';

    /**
     * OauthCredential constructor.
     * @param string $clientId
     * @param string $secret
     * @param null $expiresIn
     */
    public function __construct(string $clientId, string $secret, $expiresIn = null)
    {
        $this->clientId = $clientId;
        $this->secret = $secret;
        $this->expiresIn = $expiresIn;
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
     * @throws GuzzleException
     * @throws Exception
     */
    public function verify(): array
    {
        $url = $this->url . '/oauth/token';
        $credentials = [
            'client_id' => $this->clientId,
            'secret' => $this->secret
        ];
        $response = Client::withHeaders(Client::JSON_HEADERS)->post($url, $credentials)->json(true);
        if(!isset($response['jwt']))
        {
            throw new Exception($response['message']);
        }
        $this->accessToken = $response['jwt'];
        $this->expiresIn = $response['expires'];
        return $response;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @return array|string[]
     */
    public function getAuthHeader(): array
    {
        if(empty($this->accessToken))
        {
            return [];
        }
        return [
            'Authorization' => 'Bearer ' . $this->accessToken,
            'X-Smsto-Sdk' => $this->accessToken,
        ];
    }

    /**
     * @return array
     * @throws GuzzleException
     * @throws Exception
     */
    public function refreshToken(): array
    {
        $url = $this->url . '/refresh';
        $headers = Client::JSON_HEADERS;
        $headers = array_merge($headers, $this->getAuthHeader());
        $response = Client::withHeaders($headers)->post($url)->json(true);
        if(!isset($response['jwt']))
        {
            throw new Exception($response['message']);
        }
        $this->accessToken = $response['jwt'];
        $this->expiresIn = $response['expires'];
        return $response;
    }

    /**
     * @return mixed|null
     */
    public function getExpireTTL()
    {
        return $this->expiresIn;
    }

    /**
     * @param string $url
     * @return void
     */
    public function setBaseUrl(string $url)
    {
        $this->url = $url;
    }
}