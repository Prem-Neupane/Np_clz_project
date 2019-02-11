<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Teacher;
use App\Menu;

class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */

    
    
    public function index()
    {
        
        $identity = Auth::user()->identity;
        $id = Auth::user()->id;

        if ( Teacher::find(Auth::user()->id) ){
            return view('dashboard')
            ->with('menus',Menu::where('status','=',1)->get());
        }else{
                return redirect('/'.$identity.'/add_profile/'.$id)->with('Success','Your Profile Is Not Fully Ready. Please Submit Your Full Information');
        }

    }
}
