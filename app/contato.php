<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Aginev\SearchFilters\Filterable;

class contato extends Model
{
    use Filterable;

    protected $table = 'contato';

    protected $fillable = [
        'id_contato', 
        'pessoa', 
        'tipo_contato',
        'anotação'
    ];

    public function ContatoPessoa(){
        return $this->hasOne(pessoa::class, 'id_pessoa', 'id_contato');
    }

    public function contatoTipo(){
        return $this->hasOne(tipo_contato::class, 'id_tipo_contato', 'id_contato');
    }

    public function setFilter(){
        $this->filter->equal('id_contato');
    }
}
