<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    protected $table = 'marcas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
    ];
}
