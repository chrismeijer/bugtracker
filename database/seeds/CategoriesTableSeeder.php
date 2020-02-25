<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category' => 'Front-End'],
            ['category' => 'Back-End'],
            ['category' => 'Database'],
            ['category' => 'API'],
            ['category' => 'Website']
        ]);
    }
}
