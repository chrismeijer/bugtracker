<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('action_id');

            // SET INDEXES
                $table->primary(['role_id','action_id']);

            // FOREIGN KEYS
                // ROLES
                    $table->foreign('role_id')
                        ->references('id')->on('roles')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

                // ACTIONS 
                    $table->foreign('action_id')
                        ->references('id')->on('actions')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
