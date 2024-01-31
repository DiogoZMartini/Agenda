<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Aginev\SearchFilters\Filterable;

class endereco extends Model
{
    use Filterable;

    protected $table = 'endereco';

    protected $fillable = [
        'id_endereco', 
        'cep', 
        'rua',
        'bairro', 
        'cidade', 
        'complemento'
    ];


    public function pessoaEndereco(){
        return $this->hasOne(pessoa::class, 'id_pessoa', 'id_endereco');
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
