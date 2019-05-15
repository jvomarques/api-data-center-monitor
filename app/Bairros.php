<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Bairros extends Model
{
    protected $table = 'bairros';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'cidade_id',
        'nome',
    ];
}
