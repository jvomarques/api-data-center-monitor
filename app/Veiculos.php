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
    public static function users () {
      return this->hasMany(App\Veiculos::class, 'veiculos', 'user_id');
	} 

	public static function modelos()
	{
	  return static::with('modelos')
	    ->orderByRaw('RAND()')
	    ->limit(4)
	    ->get();
	}
	*/
}
