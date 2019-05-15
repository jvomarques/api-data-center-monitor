<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class Veiculos extends Model
{
    protected $table = 'veiculos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'modelos_id', 'cores_id', 'ano', 'km', 'placa'
    ];
    /*
    public function users () {
      return this->hasMany(App\Veiculos::class, 'veiculos', 'user_id');
	} */
}
