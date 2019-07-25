<?php

namespace App\Repositories;


use App\Models\Client;

class ClientRepository
{

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function create($data, $user)
    {
        $client = new Client($data);
        $user->client()->save($client);
        return $client;
    }

    public function update($data, $client)
    {
        $client->update($data);
        return $client;
    }
}
