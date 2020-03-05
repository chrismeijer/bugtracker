<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('created_by_user_id');
            $table->unsignedBigInteger('bug_id');
            $table->text('comment');
            $table->timestamps();

            // SET FOREIGN KEYS
                // CREATED BY USER_ID
                    $table->foreign('created_by_user_id')
                        ->references('id')->on('users')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
                // BUGR_ID
                    $table->foreign('bug_id')
                        ->references('id')->on('bugs')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
