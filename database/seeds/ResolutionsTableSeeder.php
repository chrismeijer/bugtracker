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
            ['resolution' => 'Bug'],
            ['resolution' => 'New Feature'],
            ['resolution' => 'Improvement'],
            ['resolution' => 'Task']
        ]);
    }
}
