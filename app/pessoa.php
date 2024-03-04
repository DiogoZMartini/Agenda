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

    public function relEndereco(){
        return $this->hasOne(Endereco::class, 'id', 'endereco_id');
    }

    public function pessoaContato(){
        return $this->hasMany(Contato::class,'pessoa_id');
    }

    public function setFilter(){
        $this->filter->equal('id')
        ->like('nome')
        ->like('sobrenome');
    }
}
