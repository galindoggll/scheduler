<?php

namespace App\Repositories;


use App\User;

class UserRepository
{
    public function create($data)
    {
        $data['password'] = bcrypt('password');
        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];

        return User::create($data);
    }

    public function update($data, $user)
    {
        $user = User::find($user->user_id);
        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
        $user->update($data);
        return $user;
    }
}
