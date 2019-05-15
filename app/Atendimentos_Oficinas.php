<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Atendimentos_Oficinas extends Model
{
    protected $table = 'atendimentos_oficinas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'atendimentos_id', 'oficinas_id'
    ];
}
