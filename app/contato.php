<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Aginev\SearchFilters\Filterable;

class Contato extends Model
{
    use Filterable;

    protected $table = 'contato';

    protected $fillable = [
        'id', 
        'pessoa_id', 
        'tipo_contato_id',
        'anotação',
        'contato'
    ];

    public function contatoPessoa(){
        return $this->hasOne(Pessoa::class, 'id', 'pessoa_id');
    }

    public function contatoTipo(){
        return $this->hasOne(DominioTipoContato::class, 'id', 'tipo_contato_id');
    }

    public function setFilter(){
        $this->filter->equal('id')
        ->like('Contato')
        ->equal('pessoa_id');
    }
}
