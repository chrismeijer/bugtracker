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
            ['id' => 1, 'title' => 'Front-End'],
            ['id' => 2, 'title' => 'Back-End'],
            ['id' => 3, 'title' => 'Database'],
            ['id' => 4, 'title' => 'API'],
            ['id' => 5, 'title' => 'Website']
        ]);
    }
}
