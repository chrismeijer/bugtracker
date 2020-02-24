<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // CREATE TABLE
            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('role_id');
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();

                // SET INDEXES
                    $table->index(['email', 'role_id']);
            });

        // POPULATE WITH ADMIN-USER
            DB::table('users')->insert([
                [
                    'role_id' => 1,
                    'name' => 'Admin User',
                    'email' => 'admin@admin.nl',
                    'password' => Hash::make('0000'),
                    'created_at' => date("Y/m/d")
                ]
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
