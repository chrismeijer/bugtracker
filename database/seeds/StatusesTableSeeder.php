<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            ['status' => 'Open'],
            ['status' => 'Pending'],
            ['status' => 'In Progress'],
            ['status' => 'Resolved'],
            ['status' => 'Won&acute;t fix'],
            ['status' => 'Closed'],
            ['status' => 'On Hold'],
            ['status' => 'ReOpen']
        ]);
    }
}
