<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contato', function (Blueprint $table) {
            $table->Increments('id_contato');
            $table->integer('pessoa')->unsigned();
            $table->unsignedBigInteger('tipo_contato');
            $table->string('anotacao')->nullable();

            $table->foreign('pessoa')->references('id_pessoa')->on('pessoa')->onDelete('CASCADE')->onUpdate("CASCADE");
            $table->foreign('tipo_contato')->references('id_tipo_contato')->on('tipo_contato')->onDelete('CASCADE')->onUpdate("CASCADE");

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
        Schema::dropIfExists('contato');
    }
}
