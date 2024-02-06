<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Aginev\SearchFilters\Filterable;

class Pessoa extends Model
{
    use Filterable;

    protected $table = 'pessoa';

    protected $fillable = [
        'id',
        'endereco_id',
        'nome', 
        'sobrenome', 
        'sexo'
    ];

    public function Endereco(){
        return $this->hasOne(Endereco::class, 'endereco_id', 'id');
    }

    public function pessoaContato(){
        return $this->hasMany(Contato::class,'pessoa_id');
    }

    public function setFilter(){
        $this->filter->equal('id_pessoa')
        ->like('nome')
        ->like('sobrenome')
        ->equal('sexo');
    }
}
