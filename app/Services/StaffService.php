<?php

namespace App\Services;


use App\Repositories\StaffRepository;
use App\Repositories\UserRepository;

class StaffService
{
    protected $staffRepository;
    protected $userRepository;

    public function __construct(StaffRepository $staffRepository, UserRepository $userRepository)
    {
        $this->staffRepository = $staffRepository;
        $this->userRepository = $userRepository;
    }

    public function add($data)
    {
        $user = $this->userRepository->create($data);
        return $this->staffRepository->create($data, $user);
    }

    public function edit($data, $id)
    {
        $this->userRepository->update($data, $id);
        return $this->staffRepository->update($data, $id);
    }
}
