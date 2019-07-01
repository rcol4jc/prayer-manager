<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Prayerrequest;
use App\Prayerresponse;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();
        $allRequests=Prayerrequest::all();

        $myRequests = $allRequests->where('user_id',$user->id);

        $publicRequests = $allRequests->where('user_id','!=',$user->id)->where('private',false);

        $allResponses = Prayerresponse::all();

        $myResponses = $allResponses->where('user_id', $user->id);





        return view('home', ['myRequests'=>$myRequests, 'publicRequests'=>$publicRequests,
        'myResponses'=>$myResponses]);
    }

}
