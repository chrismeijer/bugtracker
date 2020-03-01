<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            // ADMIN 
            [
                'role_id' => 1,
                'name' => 'Admin User',
                'email' => 'admin@bugtracker.nl',
                'password' => Hash::make('0000'),
                'created_at' => date("Y/m/d")
            ], 
            // EMPLOYEE
            [
                'role_id' => 2,
                'name' => 'Employee User',
                'email' => 'employee@bugtracker.nl',
                'password' => Hash::make('0000'),
                'created_at' => date("Y/m/d")
            ],
            // USER
            [
                'role_id' => 3,
                'name' => 'Common User',
                'email' => 'user@user.nl',
                'password' => Hash::make('0000'),
                'created_at' => date("Y/m/d")
            ]
        ]);
    }
}
