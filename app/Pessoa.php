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


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($pessoa) {
            if ($pessoa->relEndereco) {
                $pessoa->relEndereco->delete();
            }
        });
    }


    public function relEndereco(){
        return $this->hasOne(Endereco::class, 'pessoa_fk' , 'id');
    }

    public function relContato(){
        return $this->hasOne(Contato::class, 'id', 'contato_fk');
    }

    public function setFilter(){
        $this->filter->equal('id')
        ->like('nome')
        ->like('sobrenome');
    }
}
