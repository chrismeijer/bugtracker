<?php

use Illuminate\Database\Seeder;

class BugsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bugs')->insert([

            ['created_by_user_id' => 3, 'assigned_to_user_id' => 2, 'category_id' => 1, 'status_id' => 1, 'priority_id' => 1, 'notify_creator' => 0, 'title' => 'Homepage misses something', 'description' => 'Something is missing on the homepage.'],
            ['created_by_user_id' => 3, 'assigned_to_user_id' => null, 'category_id' => 1, 'status_id' => 5, 'priority_id' => 4, 'notify_creator' => 0, 'title' => 'Error in contact form', 'description' => 'Error in contact form.']
        ]);
    }
}
