<?php


namespace Intergo\SmsTo\Module\Shortlink;


use Intergo\SmsTo\Credentials\ICredential;
use Intergo\SmsTo\Http\Client;
use Intergo\SmsTo\Module\BaseModule;

class Shortlink extends BaseModule
{
    protected $url = 'https://sms.to';

    protected $apiVersion = 'api/v1';

    public function create(string $name, string $url)
    {
        $data = [
            'name' => $name,
            'url' => $url
        ];

        $url = $this->url . '/' . $this->apiVersion . '/shortlink';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->post($url, $data)->json(true);
    }

    public function all($limit = 20, $page = 1, $sort = 'created_at')
    {
        $payload = [
            'limit' => $limit,
            'page' => $page,
            'sort' => $sort
        ];
        $queryString = http_build_query($payload);
        $url = $this->url . '/' . $this->apiVersion . '/shortlinks?' . $queryString;
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    public function getByID($id)
    {
        $url = $this->url . '/' . $this->apiVersion . '/shortlinks/' . $id;
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    public function deleteByID($id)
    {
        $url = $this->url . '/' . $this->apiVersion . '/shortlinks/' . $id . '/delete';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->post($url)->json(true);
    }
}