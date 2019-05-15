<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Monitoramento extends Model
{
    protected $table = 'monitoramento';
    protected $primaryKey = 'id';

    protected $fillable = [
        'usuario_id','umidade', 'temperatura', 'gas'
    ];
}
