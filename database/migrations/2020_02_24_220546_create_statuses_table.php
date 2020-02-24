<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // CREATE TABLE 
            Schema::create('statuses', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('status');

                // INDEXES
                    $table->index(['status']);
            });

        // POPULATE 
            DB::table('statuses')->insert([
                ['status' => 'Open'],
                ['status' => 'Pending'],
                ['status' => 'In Progress'],
                ['status' => 'Resolved'],
                ['status' => 'Won&acute;t fix'],
                ['status' => 'Closed'],
                ['status' => 'On Hold'],
                ['status' => 'ReOpen']
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
