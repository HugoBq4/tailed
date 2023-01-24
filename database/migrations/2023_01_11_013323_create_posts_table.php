<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->unsignedBigInteger('views')->comment('Quantidade de visualizações do post');
            $table->unsignedBigInteger('language')->comment('id da lingua do post');
            $table->foreign('language')->references('language_id')->on('languages');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('file');
            $table->string('description',500)->nullable(true);
            $table->string('author',200)->nullable(true)->comment('fonte original do post se houver');
            $table->unsignedBigInteger('status')->nullable(false)->default(1);
            $table->foreign('status')->references('status_id')->on('status');
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
        Schema::dropIfExists('posts');
    }
}
