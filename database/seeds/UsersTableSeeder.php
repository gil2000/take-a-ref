<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();

        DB::table('role_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $adminRole = Role::where('name', 'admin')->first();
        $estudanteRole = Role::where('name', 'estudante')->first();
        $userRole = Role::where('name', 'user')->first();

        $user = User::create([
            'name' => 'Pedro Santos',
            'email' => 'ped.57@gmail.com',
            'password' => Hash::make('benfica69'),
            'telemovel' => '917777777',
            'nif' => '1111'
        ]);


        $estudante = User::create([
            'name' => 'Gil Aguilar Estudante',
            'email' => 'gil.aguilar2000@hotmail.com',
            'password' => Hash::make('12345678'),
            'telemovel' => '917777777',
            'nif' => '1111'
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.pt',
            'password' => Hash::make('12345678'),
            'telemovel' => '917777777',
            'nif' => '1111'
        ]);

        $user->roles()->attach($userRole);
        $estudante->roles()->attach($estudanteRole);
        $admin->roles()->attach($adminRole);

    }
}
