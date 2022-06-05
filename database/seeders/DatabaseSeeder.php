<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::create([
            'id' => 1 ,
            'name' => 'formateur'
        ]);

        Role::create([
            'id' => 2 ,
            'name' => 'apprenant'
        ]);
        Role::create([
            'id' => 3 ,
            'name' => 'admin'
        ]);
        User::create([
            'id' => 1 ,
            'name' => 'admin',
            'password'=>Hash::make('admin 123'),
            'email'=>'admin@gmail.com',
            'role_id'=> 3

        ]);
    }
}
