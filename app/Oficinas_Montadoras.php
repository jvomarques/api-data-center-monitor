<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Oficinas_Montadoras extends Model
{
    protected $table = 'oficinas_montadoras';
    protected $primaryKey = 'id';

    protected $fillable = [
        'montadoras_id', 'oficinas_id'
    ];
}
