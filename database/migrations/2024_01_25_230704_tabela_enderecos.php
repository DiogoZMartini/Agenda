<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaEnderecos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pessoa_fk')->unsigned();
            $table->integer('cep');
            $table->string('rua', 60);
            $table->string('bairro', 60);
            $table->string('cidade', 70);
            $table->string('complemento', 40)->nullable();
            $table->integer('numero');
            $table->string('estado', 50);
            $table->timestamps();

            $table->foreign('pessoa_fk')->references('id')->on('pessoa')->onDelete('CASCADE')->onUpdate("CASCADE");
 
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('endereco');
    }
}
