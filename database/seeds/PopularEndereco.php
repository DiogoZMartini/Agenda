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

        $dadosOrigem = DB::table('pessoa')->select('id')->get();


        foreach ($dadosOrigem as $dado) {
            DB::table('endereco')->insert([
                'pessoa_id' => $dado->id,

            ]);
        }
    }
}
