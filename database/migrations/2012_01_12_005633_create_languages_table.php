<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id('language_id');
            $table->string('value');
        });

        \Illuminate\Support\Facades\DB::table('languages')->insert(
            array(
                'language_id' => 1,
                'value' => 'Português'
            )
        );

        \Illuminate\Support\Facades\DB::table('languages')->insert(
            array(
                'language_id' => 2,
                'value' => 'English'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
