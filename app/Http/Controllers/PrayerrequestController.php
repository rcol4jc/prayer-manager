<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Prayerrequest;
use App\Prayerpartner;
use App\Prayerresponse;
use App\User;

class PrayerrequestController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $prayerrequests = Prayerrequest::all();
        $user= Auth::user();



        return view('Prayerrequest.index', ['prayerrequests'=>$prayerrequests, 'user'=>$user]);
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

    public function edit( $id){

        $prayerrequest=Prayerrequest::find($id);



        if ($prayerrequest->user->id == Auth::id()){
            return view('Prayerrequest.edit',['prayerrequest'=>$prayerrequest]);
        } else {
            return redirect()->route('request.show',$id)->with('error','You are not authorized to edit someone else\'s request');
        }

    }

    public function change(Request $request, $id){

        $this->validate($request,[
            'title'=>'required|string',
            'details'=>'required|max:1000',
            'enddate'=>'nullable|after_or_equal:today',
        ]);

        $prayerrequest=Prayerrequest::find($id);

        $prayerrequest->title=$request->title;
        $prayerrequest->details=$request->details;

        if (!empty($request->enddate)){
            $enddate=new \DateTime($request->enddate);

            $prayerrequest->enddate=$enddate->format('Y-m-d');
        }

        if ($request->private){
            $prayerrequest->private=true;
        } else {
            $prayerrequest->private=false;
        }

        if ($request->answered){
            $prayerrequest->answered=true;
        } else {
            $prayerrequest->answered=false;
        }

        $prayerrequest->save();

        return redirect()->route('request.show',$id);
    }

    public function show($id){

        $user=Auth::user();

        $prayerrequest=Prayerrequest::find($id);
        $col_count=6;

        $prayerrequest->prayerresponses()->where('private', 0)->orWhere('user_id',$user->id)->get();
        if ($prayerrequest->user_id == $user->id){
            $col_count=4;
        }
        if ($user->id == $prayerrequest->user_id || (!$prayerrequest->private)){
            $prayerrequest->load('prayerresponses');

            return view('Prayerrequest.show', ['prayerrequest'=>$prayerrequest,'user'=>$user, 'col_count'=>$col_count]);
        } else {
            return redirect()->route('request.index');
        }

    }

    public function pray(Request $request, $id){

        $user=Auth::user();

        $prayerrequest = Prayerrequest::find($id);

        $prayerpartner = new Prayerpartner();

        $prayerpartner->user_id=$user->id;
        $prayerpartner->prayerrequest_id=$prayerrequest->id;

        $prayerpartner->save();

        return redirect()->back();

    }


    public function showPartners($id){



        $prayerrequest = Prayerrequest::find($id);
        $users = User::all();

        return view('Prayerrequest.partners', ['prayerrequest'=>$prayerrequest, 'users'=>$users]);

    }

    public function delete($id){

        $prayerrequest = Prayerrequest::findOrFail($id);

        $deletedResponses = Prayerresponse::where('prayerrequest_id',$id)->delete();

        $deletedPartners = Prayerpartner::where('Prayerrequest_id', $id)->delete();

        $prayerrequest->destroy($id);

        return redirect()->route('request.index');





    }
}
