<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // CREATE TABLE 
            Schema::create('resolutions', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('resolution');

                // SET INDEX
                    $table->index('resolution');
            });

        // POPULATE TABLE
            DB::table('resolutions')->insert([
                ['resolution' => 'Bug'],
                ['resolution' => 'New Feature'],
                ['resolution' => 'Improvement'],
                ['resolution' => 'Task']
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resolutions');
    }
}
