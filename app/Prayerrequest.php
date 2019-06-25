<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prayerrequest extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function prayerresponses(){
        return $this->hasMany('App\Prayerresponse');
    }

    public function prayerpartners(){
        return $this->hasMany('App\Prayerpartner');
    }
}
