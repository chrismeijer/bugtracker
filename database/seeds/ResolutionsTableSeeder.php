<?php

use Illuminate\Database\Seeder;

class ResolutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resolutions')->insert([
            ['id' => 1, 'title' => 'Bug'],
            ['id' => 2, 'title' => 'New Feature'],
            ['id' => 3, 'title' => 'Improvement'],
            ['id' => 4, 'title' => 'Task']
        ]);
    }
}
