<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class CreateClassificacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classificacao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('time_id');
            $table->integer('pontos');
            $table->integer('quantidade_jogos');
            $table->integer('quantidade_vitorias');
            $table->integer('quantidade_empates');
            $table->integer('quantidade_derrotas');
            $table->integer('gols_pro');
            $table->integer('gols_contra');
            $table->integer('saldo_gols');

            $table->foreign('time_id')->references('id')->on('times');
            $table->timestamps();
        });


        DB::table('classificacao')->insert(
            array(
                ['time_id'             => 1, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 2, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 3, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 4, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 5, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 6, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 7, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 8, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 9, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 10, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 11, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 12, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 13, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 14, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 15, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 16, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 17, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 18, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 19, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],

                ['time_id'             => 20, 
                 'pontos'              => 0, 
                 'quantidade_jogos'    => 0, 
                 'quantidade_vitorias' => 0, 
                 'quantidade_empates'  => 0, 
                 'quantidade_derrotas' => 0,
                 'gols_pro'            => 0,
                 'gols_contra'         => 0,
                 'saldo_gols'          => 0,
                ],
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
        Schema::dropIfExists('classificacao');
    }
}
