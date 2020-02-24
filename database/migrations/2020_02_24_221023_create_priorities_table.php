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
                $table->string('priority');

                // SET INDEX
                    $table->index('priority');
            });
        
        // POPULATE TABLE
            DB::table('priorities')->insert([
                ['priority' => 'No Priority'],
                ['priority' => 'Low'],
                ['priority' => 'Normal'],
                ['priority' => 'High'],
                ['priority' => 'Immediate']
            ]);
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
