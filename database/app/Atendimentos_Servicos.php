<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Atendimentos_Servicos extends Model
{
    protected $table = 'atendimentos_servicos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'atendimentos_id', 'servicos_id'
    ];
}
