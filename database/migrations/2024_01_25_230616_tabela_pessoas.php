<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaPessoas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa', function (Blueprint $table) {
            $table->Increments('id_pessoa');
            $table->unsignedBigInteger('endereco');
            $table->string('nome', 20);
            $table->string('sobrenome', 50);
            // $table->enum('sexo', ['M','F']);


            $table->foreign('endereco')->references('id_endereco')->on('endereco')->onDelete('CASCADE')->onUpdate("CASCADE");

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
        Schema::dropIfExists('pessoa');
    }
}
