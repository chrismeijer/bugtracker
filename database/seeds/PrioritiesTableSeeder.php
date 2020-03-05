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
            ['id' => 1, 'title' => 'No Priority', 'sort_no' => 1],
            ['id' => 2, 'title' => 'Low', 'sort_no' => 2],
            ['id' => 3, 'title' => 'Normal', 'sort_no' => 3],
            ['id' => 4, 'title' => 'High', 'sort_no' => 4],
            ['id' => 5, 'title' => 'Immediate', 'sort_no' => 5]
        ]);
    }
}
