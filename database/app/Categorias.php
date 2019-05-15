<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
    ];
}
