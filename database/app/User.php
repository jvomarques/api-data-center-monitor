<?php

namespace API;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nome', 'email', 'senha', 'cpf',
        'logradouro', 'complemento', 'bairro',
        'numero', 'cidade', 'cep', 'uf','telefone1', 'telefone2'
    ];

    protected $hidden = [
        'senha',
    ];
}