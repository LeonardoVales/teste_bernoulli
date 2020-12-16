<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class CreateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->string('nome_time', 50);            
        });

        DB::table('times')->insert(
            array(
                ['nome_time' => 'São Paulo'],
                ['nome_time' => 'Atlético-MG'],
                ['nome_time' => 'Flemento'],
                ['nome_time' => 'Palmeiras'],
                ['nome_time' => 'Internacional'],
                ['nome_time' => 'Grêmio'],
                ['nome_time' => 'Fluminense'],
                ['nome_time' => 'Santos'],
                ['nome_time' => 'Corinthians'],
                ['nome_time' => 'Ceará SC'],
                ['nome_time' => 'Bragantino'],
                ['nome_time' => 'Atlético-GO'],
                ['nome_time' => 'Athletico-PR'],
                ['nome_time' => 'Fortaleza'],
                ['nome_time' => 'Sport Recife'],
                ['nome_time' => 'Bahia'],
                ['nome_time' => 'Vasco da Gama'],
                ['nome_time' => 'Coritiba'],
                ['nome_time' => 'Goiás'],
                ['nome_time' => 'Botafogo'],
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
        Schema::dropIfExists('times');
    }
}
