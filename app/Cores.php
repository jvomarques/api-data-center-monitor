<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Cores extends Model
{
    protected $table = 'cores';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome_cor',
    ];
}
