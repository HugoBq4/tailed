<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sqls = [
            "alter table comment_tails
    add constraint comment_tails_pk
        primary key (comment_id, user_id);",//tails de comments

            "alter table post_categories
    add constraint post_categories_pk
        primary key (post_id, category_id);",//categorias

            "alter table posts_tags
    add constraint posts_tags_pk
        primary key (post_id, tag_id);",//tags

            "alter table reposts
    add constraint reposts_pk
        primary key (post_id, user_id);",//reposts

            "alter table tails
    add constraint tails_pk
        primary key (post_id, user_id);",//tails

            "alter table visits
    add constraint visits_pk
        primary key (visitor_id, visited_id);",//visits

            "alter table follows
    add constraint follows_pk
        primary key (follower_id, followed_id);",//visits



            ];
        foreach($sqls as $sql){
            \Illuminate\Support\Facades\DB::statement($sql);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
