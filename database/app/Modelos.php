<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Modelos extends Model
{
    protected $table = 'modelos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'marcas_id', 'nome'
    ];
}
