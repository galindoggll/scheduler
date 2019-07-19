<?php

use App\Models\StaffTypes;
use Illuminate\Database\Seeder;

class StaffTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type1 = new StaffTypes();
        $type1->type = 'dentist';
        $type1->description = 'A Dentist Staff';
        $type1->save();

        $type2 = new StaffTypes();
        $type2->type = 'receptionist';
        $type2->description = 'A Receptionist Staff';
        $type2->save();
    }
}
