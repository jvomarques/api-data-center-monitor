<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Situacoes extends Model
{
    protected $table = 'situacoes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome'
    ];
}
