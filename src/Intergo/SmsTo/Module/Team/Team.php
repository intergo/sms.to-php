<?php


namespace Intergo\SmsTo\Module\Team;


use Intergo\SmsTo\Credentials\ICredential;
use Intergo\SmsTo\Http\Client;
use Intergo\SmsTo\Module\BaseModule;

class Team extends BaseModule
{
    protected $url = 'https://sms.to';

    public function allMembers()
    {
        $url = $this->url . '/' . $this->apiVersion . '/team/users';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    public function allInvitations()
    {
        $url = $this->url . '/' . $this->apiVersion . '/team/invitations';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    public function generateMember()
    {
        $data = [
            'auto_generate_credentials' => true,
            'terms_conditions' => true,
        ];
        $url = $this->url . '/' . $this->apiVersion . '/team/user/create';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->post($url, $data)->json(true);
    }

    public function inviteMemberByEmail(string $email)
    {
        $data = [
            'email' => $email,
        ];
        $url = $this->url . '/' . $this->apiVersion . '/team/user/invite';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->post($url, $data)->json(true);
    }

    public function disableMemberByID($id)
    {
        $url = $this->url . '/' . $this->apiVersion . '/team/user/' . $id . '/disable';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    public function enableMemberByID($id)
    {
        $url = $this->url . '/' . $this->apiVersion . '/team/user/' . $id . '/enable';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    public function creditMemberByID($id, $amount)
    {
        $url = $this->url . '/' . $this->apiVersion . '/team/user/' . $id . '/credit?amount=' . $amount;
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    public function debitMemberByID($id, $amount)
    {
        $url = $this->url . '/' . $this->apiVersion . '/team/user/' . $id . '/debit?amount=' . $amount;
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->get($url)->json(true);
    }

    public function deleteMemberByID($id, $amount)
    {
        $url = $this->url . '/' . $this->apiVersion . '/team/user/' . $id . '/delete';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->delete($url)->json(true);
    }

    public function deleteInviteByID($id)
    {
        $url = $this->url . '/' . $this->apiVersion . '/team/invitation/' . $id . '/delete';
        $headers = array_merge(Client::JSON_HEADERS, $this->credentials->getAuthHeader());
        return Client::withHeaders($headers)->delete($url)->json(true);
    }
}