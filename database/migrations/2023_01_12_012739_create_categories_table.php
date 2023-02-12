<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('value');
            $table->unsignedBigInteger('status')->nullable(false)->default(1);
            $table->foreign('status')->references('status_id')->on('status');
        });
        $categorias = [
            'Animais',
            'Anime',
            'Criativos',
            'Carros',
            'Celebridades',
            'Jogos',
            'Internet',
            'Política',
            'Memes',
            'Outros',
            'Ciência',
            'Esportes',
            'TV'
        ];
        foreach ($categorias as $c)
            \Illuminate\Support\Facades\DB::table('categories')->insert(
                array(
                    'value' => $c
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
        Schema::dropIfExists('categories');
    }
}
