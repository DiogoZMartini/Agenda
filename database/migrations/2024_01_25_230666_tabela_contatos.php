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
            $table->bigIncrements('id');
            $table->integer('pessoa_fk')->unsigned();
            $table->unsignedBigInteger('tipo_contato_fk');
            $table->string('anotacao')->nullable();
            $table->string('contato', 60);

            $table->foreign('tipo_contato_fk')->references('id')->on('tipo_contato')->onDelete('CASCADE')->onUpdate("CASCADE");
            $table->foreign('pessoa_fk')->references('id')->on('pessoa')->onDelete('CASCADE')->onUpdate("CASCADE");
 
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
