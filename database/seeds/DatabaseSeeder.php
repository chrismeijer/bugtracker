<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ActionsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PrioritiesTableSeeder::class);
        $this->call(ResolutionsTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
    }
}
