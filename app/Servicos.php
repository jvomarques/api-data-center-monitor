<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
    protected $table = 'servicos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome'
    ];
}
