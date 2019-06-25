<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prayerresponse extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function prayerrequest(){
        return $this->belongsTo(('App\Prayerrequest'));
    }
}
