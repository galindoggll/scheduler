<?php

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_client = new Roles();
        $role_client->name = 'client';
        $role_client->description = 'A Client User';
        $role_client->save();

        $role_staff = new Roles();
        $role_staff->name = 'staff';
        $role_staff->description = 'A Employee User';
        $role_staff->save();
    }
}
