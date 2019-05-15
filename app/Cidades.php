<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Cidades extends Model
{
    protected $table = 'cidades';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
    ];
}
