<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    //==================================================================================================
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'estudante']);
        Role::create(['name' => 'user']);
    }
}
