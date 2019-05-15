<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Comissoes extends Model
{
    protected $table = 'comissoes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'comissao',
    ];
}
