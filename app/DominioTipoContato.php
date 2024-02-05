<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Aginev\SearchFilters\Filterable;

class DominioTipoContato extends Model
{
    use Filterable;

    protected $table = 'tipo_contato';

    protected $fillable = [
        'id', 
        'tipo', 
        'descricao'
    ];

    public function tipoContato(){
        return $this->hasOne(Contato::class, 'tipo_contato_id');
    }

    public function setFilter(){
        $this->filter->equal('id_tipo_contato')
        ->like('tipo');
    }
}
