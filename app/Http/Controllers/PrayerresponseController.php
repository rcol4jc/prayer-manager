<?php

namespace App\Http\Controllers;

use App\Prayerrequest;
use App\Prayerresponse;
use Auth;
use Illuminate\Http\Request;

class PrayerresponseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save(Request $request, $id){
        //validate first
        $this->validate($request, [
            'details'=>'required|max:1000'
        ]);

        //get Prayerrequest with id
        $prayerrequest=Prayerrequest::find($id);

        $prayerresponse= new Prayerresponse();

        $prayerresponse->details=$request->details;
        $prayerresponse->user_id=Auth::id();

        If (!$request->private){
            $prayerresponse->private=false;
        }

        $prayerrequest->prayerresponses()->save($prayerresponse);

        return redirect()->route('request.show', $id);



    }
}
