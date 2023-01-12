<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cellphone')->nullable(true);
            $table->string('picture')->nullable(true);
            $table->string('background')->nullable(true);
            $table->string('description')->nullable(true);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('sequence')->default(0);
            $table->unsignedBigInteger('language')->nullable(false)->default(1);
            $table->foreign('language')->references('language_id')->on('languages');
            $table->integer('type_user')->default(0);
            $table->unsignedBigInteger('status')->nullable(false)->default(1);
            $table->foreign('status')->references('status_id')->on('status');
            $table->rememberToken();
            $table->timestamps();
        });
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
