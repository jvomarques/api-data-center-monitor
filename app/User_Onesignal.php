<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class User_Onesignal extends Model
{
    protected $table = 'user_onesignals';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id', 'onesignal_id'
    ];

    public function onSignals()
    {
        return $this->belongsToMany('App\User');
    }
}
