<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Aginev\SearchFilters\Filterable;

class tipo_contato extends Model
{
    use Filterable;

    protected $table = 'tipo_contato';

    protected $fillable = [
        'id_tipo_contato', 
        'tipo', 
        'descricao'
    ];

    public function tipoContato(){
        return $this->hasOne(contato::class, 'id_contato', 'id_tipo_contato');
    }

    public function setFilter(){
        $this->filter->equal('id_tipo_contato');
    }
}
