<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class TabelaTipoContato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_contato', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo')->unique();
            $table->text('descricao')->nullable();
            $table->timestamps();
        });

        DB::table('tipo_contato')->insert([
            ['tipo' => 'email', 'descricao' => 'E-mail'],
            ['tipo' => 'celular', 'descricao' => 'Celular'],
            ['tipo' => 'fixo', 'descricao' => 'Telefone Fixo']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_contato');
    }
}
