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
            [
                'role_id' => 1,
                'name' => 'Admin User',
                'email' => 'admin@admin.nl',
                'password' => Hash::make('0000'),
                'created_at' => date("Y/m/d")
            ], 
            [
                'role_id' => 2,
                'name' => 'Employee User',
                'email' => 'employee@admin.nl',
                'password' => Hash::make('0000'),
                'created_at' => date("Y/m/d")
            ]
        ]);
    }
}
