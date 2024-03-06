<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Aginev\SearchFilters\Filterable;

class Endereco extends Model
{
    use Filterable;

    protected $table = 'endereco';

    protected $fillable = [
        'id', 
        'cep', 
        'rua',
        'bairro', 
        'cidade', 
        'complemento',
        'estado',
        'numero',
        'pessoa_id',
    ];

    public function relPessoa(){
        return $this->hasOne(Pessoa::class, 'id', 'pessoa_id');
    }

    public function setFilter(){
        $this->filter->equal('id_endereco')
        ->like('cep')
        ->like('rua')
        ->like('bairro')
        ->like('cidade')
        ->like('complemento');
    }
}
