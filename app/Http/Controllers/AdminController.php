<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;

class AdminController extends Controller
{
    public function login(Request $request){    

    	if($request->isMethod('post')){

    		$data = $request->input();

	    	if(Auth::attempt(['email'=> $data['email'],'password'=>$data['password'],'identity' => 'admin'])){

                Session::put('adminsession',$data['email']);
	    	  return redirect('/admin/dashboard');    		
	    	}else{
                return redirect('/admin')->with('flash_msg_err','invalid username or password');	    		
	    	}	
    	}    	
    	return view('Admin.admin_login');
    }

    public function logout(){        
        Session::flush();
        return redirect('/admin')->with('flash_msg_success','Successfully logged out');        
    }

    public function dashboard(){    	

        //the dashboard is protected by route group so no need of {if else block}

        //this is the session method to control
        if(Session::has('adminsession')){
            //do something of session...
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
        
    	return view('Admin.admin_dashboard')->with('highlight,dashboard');
    }    

    //to show the form to add the users...
    public function register_users(){

        if(Session::has('adminsession')){
            return view('Admin.admin_add')->with('highlight','admin_add');
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }        
    }

    //to show the form to add the menu for navbar...
    public function add_menu(){

        if(Session::has('adminsession')){
            //do something of session...
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }

        return view('Admin.admin_menu')->with('highlight','admin_menu');
    }

    //to view every data as a table in admin panel...
    public function view(){
        if(Session::has('adminsession')){
            $users = User::all();
            return view('Admin.admin_viewdata')->with('users',$users);
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');   
        }    
    }
}