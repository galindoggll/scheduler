<?php

namespace App\Services;


use App\Repositories\ClientRepository;
use App\Repositories\UserRepository;

class ClientService
{
    protected $clientRepository;
    protected $userRepository;

    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }

    public function add($data)
    {
        $user = $this->userRepository->create($data);
        return $this->clientRepository->create($data, $user);
    }

    public function edit($data, $id)
    {
        $this->userRepository->update($data, $id);
        return $this->clientRepository->update($data, $id);
    }
}
