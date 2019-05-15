<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Oficinas extends Model
{
    protected $table = 'oficinas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome', 'cnpj', 'email', 'tel1', 'tel2', 'tel3', 'cep', 'endereco', 'numero', 'complemento', 'bairro', 'pontoreferencia', 'lat', 'long'
    ];
}
