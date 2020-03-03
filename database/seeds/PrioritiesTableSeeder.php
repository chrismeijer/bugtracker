<?php

use Illuminate\Database\Seeder;

class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->insert([
            ['id' => 1, 'title' => 'No Priority'],
            ['id' => 2, 'title' => 'Low'],
            ['id' => 3, 'title' => 'Normal'],
            ['id' => 4, 'title' => 'High'],
            ['id' => 5, 'title' => 'Immediate']
        ]);
    }
}
