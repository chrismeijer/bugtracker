<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrioritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // CREATE TABLE
            Schema::create('priorities', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title');
                $table->tinyInteger('sort_no');
                $table->timestamps();

                // SET INDEX
                    $table->index('title');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('priorities');
    }
}
