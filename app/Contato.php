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
        'contato'
    ];

    public function relPessoa(){
        return $this->hasMany(Pessoa::class, 'contato_fk', 'id');
    }

    public function relDominioTipoContato(){
        return $this->hasOne(DominioTipoContato::class, 'id', 'tipo_contato_id');
    }

    public function setFilter()
    {
        $this->equal('pessoa_id', 'ID da Pessoa')
            ->like('contato')
            ->relation('relPessoa', 'nome', 'like', '%?%');
    }
}