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
            $table->id('comment_id');
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
            //post do comentário
            $table->unsignedBigInteger('post_id')->nullable(false);
            $table->foreign('post_id')->references('post_id')->on('posts');
            //post mencionado
            $table->unsignedBigInteger('mentioned_post_id')->nullable(false);
            $table->foreign('mentioned_post_id')->references('post_id')->on('posts');
            $table->unsignedBigInteger('reply_comment_id')->nullable(true);
            $table->foreign('reply_comment_id')->references('comment_id')->on('comments');
            $table->string('comment','1000');
            $table->unsignedBigInteger('status')->nullable(false)->default(1);
            $table->foreign('status')->references('status_id')->on('status');
            //se comentário é editado
            $table->boolean('edited')->nullable(false);
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
        Schema::dropIfExists('comments');
    }
}
