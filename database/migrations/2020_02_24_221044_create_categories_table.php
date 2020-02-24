<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // CREATE TABLE
            Schema::create('categories', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('category');

                // INDEXES
                    $table->index(['category']);
            });

        // POPULATE TABLE
            DB::table('categories')->insert([
                ['category' => 'Front-End'],
                ['category' => 'Back-End'],
                ['category' => 'Database'],
                ['category' => 'API'],
                ['category' => 'Website']
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
