<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Aginev\SearchFilters\Filterable;

class pessoa extends Model
{
    use Filterable;

    protected $table = 'pessoa';

    protected $fillable = [
        'id_pessoa',
        'endereco',
        'nome', 
        'sobrenome', 
        'sexo'
    ];

    public function pessoaEndereco(){
        return $this->hasOne(endereco::class, 'id_endereco', 'id_pessoa');
    }

    public function pessoaContato(){
        return $this->hasMany(contato::class,'id_contato', 'id_pessoa');
    }

    public function setFilter(){
        $this->filter->equal('id_pessoa')
        ->like('nome')
        ->like('sobrenome')
        ->equal('sexo');
    }
}
