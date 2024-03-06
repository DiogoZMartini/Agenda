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
        'nome', 
        'sobrenome', 
        'sexo'
    ];

    public function relEndereco(){
        return $this->hasOne(Endereco::class, 'pessoa_id');
    }

    public function relContato(){
        return $this->hasMany(Contato::class, 'pessoa_id', 'id');
    }

    public function setFilter(){
        $this->filter->equal('id')
        ->like('nome')
        ->like('sobrenome');
    }
}
