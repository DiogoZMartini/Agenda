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

    protected $fillable = [
        'pessoa_fk',
        'tipo_contato_fk',
        'anotacao',
        'contato',
    ];

    public function relPessoa(){
        return $this->hasOne(Pessoa::class, 'id', 'pessoa_fk');
    }

    public function relDominioTipoContato(){
        return $this->hasOne(DominioTipoContato::class, 'id', 'tipo_contato_fk');
    }

    public function setFilter()
    {
        $this->equal('id')
            ->like('contato')
            ->relation('relPessoa', 'nome', 'like', '%?%');
    }
}
