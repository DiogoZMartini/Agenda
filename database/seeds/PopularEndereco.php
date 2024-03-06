<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PopularEndereco extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('endereco')
        ->join('pessoa', function ($join) {
            $join->on('pessoa.id_endereco', '=', 'endereco.id');
        })
        ->update(['endereco.pessoa_id' => DB::raw('pessoa.id')]);
    }
}
