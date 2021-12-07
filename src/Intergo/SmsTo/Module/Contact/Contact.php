<?php


namespace Intergo\SmsTo\Module\Contact;


use Intergo\SmsTo\Credentials\ICredential;
use Intergo\SmsTo\Http\Client;
use Intergo\SmsTo\Module\BaseModule;

class Contact extends BaseModule
{
    protected $url = 'https://sms.to';

    public function createList($name, $description, $shareWithTeam = 0)
    {
        $data = [
            'name' => $name,
            'description' => $description,
            'share_with_team' => $shareWithTeam
        ];
        $url = $this->url . '/' . $this->apiVersion . '/people/lists/create';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->post($url, $data)->json(true);
    }

    public function create(string $phone, $listIds, array $otherData = [])
    {
        $data = [
            'phone' => $phone,
            'list_ids' => $listIds,
        ];
        $data = array_merge($data, $otherData);
        $url = $this->url . '/' . $this->apiVersion . '/people/contacts/create';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->post($url, $data)->json(true);
    }

    public function deleteByPhone($phone, $listIds = [])
    {
        $data = [
            'phone' => $phone,
            'list_id' => $listIds,
        ];
        $url = $this->url . '/' . $this->apiVersion . '/people/contacts/delete-phone';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->post($url, $data)->json(true);
    }

    public function optinByPhone($phone, $listIds = [])
    {
        $data = [
            'phone' => $phone,
            'list_id' => $listIds,
        ];
        $url = $this->url . '/' . $this->apiVersion . '/people/contacts/optin';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->post($url, $data)->json(true);
    }

    public function optoutByPhone($phone, $listIds = [])
    {
        $data = [
            'phone' => $phone,
            'list_id' => $listIds,
        ];
        $url = $this->url . '/' . $this->apiVersion . '/people/contacts/optout';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->post($url, $data)->json(true);
    }

    public function recentOptouts()
    {
        $url = $this->url . '/' . $this->apiVersion . '/recent/optouts';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    public function getContactListByListID($id, $limit = 100, $page = 1, $orderBy = 'firstname', $direction = 'ASC')
    {
        $payload = [
            'list_ids' => $id,
            'limit' => $limit,
            'page' => $page,
            'order_by' => $orderBy,
            'direction' => $direction,
        ];
        $queryString = http_build_query($payload);
        $url = $this->url . '/' . $this->apiVersion . '/people/contacts?' . $queryString;
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    public function allList($name = '', $page = 1, $direction = 'ASC')
    {
        $payload = ['direction' => $direction];
        if(!empty($name))
        {
            $payload['name'] = $name;
        }
        if(!empty($page))
        {
            $payload['page'] = $page;
        }
        $queryString = http_build_query($payload);
        $url = $this->url . '/' . $this->apiVersion . '/people/lists?' . $queryString;
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    public function deleteListByID($id)
    {
        $url = $this->url . '/' . $this->apiVersion . '/people/lists/' . $id . '/delete';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->delete($url)->json(true);
    }
}