<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Aginev\SearchFilters\Filterable;

class Contato extends Model
{
    use Filterable;

    protected $table = 'contato';

    protected $filterable = [
        'id', 
        'pessoa_id',
        'contato'
    ];

    public function relPessoa(){
        return $this->hasOne(Pessoa::class, 'id', 'pessoa_id');
    }

    public function contatoTipo(){
        return $this->hasOne(DominioTipoContato::class, 'id', 'tipo_contato_id');
    }

    public function setFilter()
    {
        $this->equal('pessoa_id', 'ID da Pessoa')
            ->like('Contato')
            ->relation('relPessoa', 'nome', 'like', '%?%');
    }
}
