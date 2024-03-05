<?php

namespace App;
use Aginev\SearchFilters\Filters\Filter;

class ContatoFilter extends Filter
{
    public function setFilter()
    {
        $this->equal('pessoa_id', 'ID da Pessoa')
            ->like('Contato')
            ->relation('relPessoa', 'nome', 'like', '%?%');
    }
}
