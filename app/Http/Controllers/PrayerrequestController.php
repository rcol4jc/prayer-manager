<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Prayerrequest;
use App\Prayerpartner;

class PrayerrequestController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        //
    }

    public function new(){

        return view('Prayerrequest.new');

    }

    public function save(Request $request){

        $this->validate($request,[
            'title'=>'required|string',
            'details'=>'required|max:1000',
            'enddate'=>'nullable|date'
        ]);

        //get User of logged in person
        $user=Auth::user();

        $prayerRequest=new Prayerrequest();

        $prayerRequest->title=$request->title;
        $prayerRequest->details=$request->details;

        if (!empty($request->enddate)){
            $enddate=new \DateTime($request->enddate);
            $prayerRequest->enddate=$enddate->format('Y-m-d');
        }

        if (!$request->private){
            $prayerRequest->private=false;
        }



        $user->prayerrequests()->save($prayerRequest);

        //Save as prayer partner
        $prayerPartner=new Prayerpartner();
        $prayerPartner->user_id=$user->id;
        $prayerPartner->prayerrequest_id=$prayerRequest->id;
        $prayerPartner->save();

        return redirect()->route('request.show',$prayerRequest->id);


    }

    public function show($id){

        $user=Auth::user();

        $prayerrequest=Prayerrequest::find($id);

        $prayerrequest->prayerresponses()->where('private', 0)->orWhere('user_id',$user->id)->get();

        if ($user->id == $prayerrequest->user_id || (!$prayerrequest->private)){
            $prayerrequest->load('prayerresponses');

            return view('Prayerrequest.show', ['prayerrequest'=>$prayerrequest,'user'=>$user]);
        } else {
            return redirect()->route('request.index');
        }

    }


    public function showPartners($id){

    }
}
