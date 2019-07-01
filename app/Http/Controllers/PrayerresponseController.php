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

    public function index(){

        $user=Auth::user();

        $allResponses = Prayerresponse::all();
        $myResponses=$allResponses->where('user_id','=',$user->id);


        return view('Prayerresponse.index', ['myResponses'=>$myResponses,'user'=>$user]);


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


    public function edit($id){

        $prayerresponse=Prayerresponse::find($id);

        $user=Auth::user();

        if ($prayerresponse->user_id == $user->id){
            return view('Prayerresponse.edit',['prayerresponse'=> $prayerresponse]);
        } else {
            return redirect()->route('home');
        }

    }

    public function change(Request $request, $id){

        $this->validate($request, [
            'details'=>'required'
        ]);

        $prayerresponse = Prayerresponse::find($id);

        $prayerresponse->details=$request->details;

        $prayerresponse->save();

        return redirect()->route('response.index');
    }

    public function delete(Request $request, $id){
        $user=Auth::user();

        $prayerresponse = Prayerresponse::find($id);

        if ($prayerresponse->user_id == $user->id){

            $prayerresponse->destroy($id);
            return redirect()->route('response.index');
        } else {
            return redirect()->route('response.index');
        }
    }
}
