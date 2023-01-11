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
            $table->unsignedBigInteger('post_id')->nullable(false);
            $table->foreign('post_id')->references('post_id')->on('posts');
            $table->unsignedBigInteger('reply_comment_id')->nullable(true);
            $table->foreign('reply_comment_id')->references('comment_id')->on('comments');
            $table->string('comment','500');
            $table->unsignedBigInteger('post_id')->nullable(false)->default(1);
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
