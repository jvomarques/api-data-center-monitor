<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Atendimentos extends Model
{
    protected $table = 'atendimentos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id','dataabertura', 'veiculos_id', 'oficinas_id', 'dataagendamento', 'tempoprevisto', 'datafechamento', 'valor', 'avaliacoes_id', 'logradouro', 'complemento', 'bairro', 'numero', 'cidade', 'cep', 'uf', 'situacoes', 'observacoes'
    ];
}