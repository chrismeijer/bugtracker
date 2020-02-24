<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // CREATE TABLE
            Schema::create('bugs', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('created_by_user_id');
                $table->unsignedBigInteger('assigned_to_user_id');
                $table->unsignedBigInteger('category_id');
                $table->unsignedBigInteger('status_id');
                $table->unsignedBigInteger('priority_id');
                $table->boolean('notify_creator');
                $table->string('title', 255);
                $table->text('description');
                $table->timestamps();

                // SET INDEXES
                    //$table->index(['','','']);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bugs');
    }
}
