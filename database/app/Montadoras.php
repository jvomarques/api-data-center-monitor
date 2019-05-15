<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Montadoras extends Model
{
    protected $table = 'montadoras';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome'
    ];
}
