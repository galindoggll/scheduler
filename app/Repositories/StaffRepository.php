<?php

namespace App\Repositories;


use App\Models\Staff;

class StaffRepository
{
    protected $staff;

    public function __construct(Staff $staff)
    {
        $this->staff = $staff;
    }

    public function create($data, $user)
    {
        $staff = new Staff($data);
        $user->staff()->save($staff);
        return $staff;
    }

    public function update($data, $staff)
    {
        $staff->update($data);
        return $staff;
    }
}
