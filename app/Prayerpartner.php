<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prayerpartner extends Model
{
    public function user(){
        return $this->hasOne('App\User');
    }

    public function prayerrequest(){
        return $this->hasOne('App\Prayerrequest');
    }
}
