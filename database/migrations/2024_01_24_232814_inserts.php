<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Inserts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $motivos = array(
            array(
                'description' => 'Discurso de ódio',
            ),
            array(
                'description' => 'Nudez',
            ),
            array(
                'description' => 'Spam',
            ),
            array(
                'description' => 'Golpe ou fraude',
            ),
            array(
                'description' => 'Injúria Direcionada',
            ),
            array(
                'description' => 'Ameaças Nocivas',
            ),
            array(
                'description' => 'Violência',
            ),
            array(
                'description' => 'Assédio',
            ),
            array(
                'description' => 'Suicídio ou auto-lesão',
            ),
            array(
                'description' => 'Mercadorias ilegais ou regulamentadas',
            ),
            array(
                'description' => 'Problemas de Banner',
            ),
        );

        foreach ($motivos as $motivo) {
            \Illuminate\Support\Facades\DB::table('reports')->insert($motivo);
        }
        $user = new User();
        $user->name = 'Horo';
        $user->password = md5('12645a');
        $user->type_user = 1;
        $user->email = 'victorhugosens@live.com';
        $user->cellphone = '47999698884';
        $user->save();

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
