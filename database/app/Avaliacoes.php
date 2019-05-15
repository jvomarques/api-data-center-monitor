<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Avaliacoes extends Model
{
    protected $table = 'avaliacoes';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'valor',
    ];
}
