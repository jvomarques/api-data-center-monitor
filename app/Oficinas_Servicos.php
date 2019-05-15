<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Oficinas_Servicos extends Model
{
    protected $table = 'oficinas_servicos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'servicos_id', 'oficinas_id'
    ];
}
