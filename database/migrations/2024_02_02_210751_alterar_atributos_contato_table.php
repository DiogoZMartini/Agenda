<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterarAtributosContatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contato', function (Blueprint $table) {
            $table->renameColumn('id_contato', 'id');
            $table->renameColumn('pessoa', 'pessoa_id');
            $table->renameColumn('tipo_contato', 'tipo_contato_id');
            $table->string('contato', 60);
        });
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
