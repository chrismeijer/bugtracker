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
            ['id' => 1, 'title' => 'Open'],
            ['id' => 2, 'title' => 'Pending'],
            ['id' => 3, 'title' => 'In Progress'],
            ['id' => 4, 'title' => 'Resolved'],
            ['id' => 5, 'title' => 'Won&acute;t fix'],
            ['id' => 6, 'title' => 'Closed'],
            ['id' => 7, 'title' => 'On Hold'],
            ['id' => 8, 'title' => 'ReOpen']
        ]);
    }
}
