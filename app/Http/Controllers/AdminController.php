<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;

class AdminController extends Controller
{
    public function login(Request $request){    

    	if($request->isMethod('post')){

    		$data = $request->input();

	    	if(Auth::attempt([
                'email'=> $data['email'],
                'password'=>$data['password'],
                'identity' => 'admin'
            ])){

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

        //if the dashboard is protected by route group so no need of session {if else block}

        //this is the session method to control

        if(Session::has('adminsession')){
            return view('Admin.admin_dashboard')->with('highlight,dashboard');
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }        
    }    

    //to show the form to add the users...
    public function register_users(Request $request){
        
        if(Session::has('adminsession')){
            if($request->isMethod('get')){
                return view('Admin.admin_add')->with('highlight','admin_add');
             }else{
                $this->validate($request,[
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|  unique:users',
                'gender' => 'required',
                'password_confirmation' => 'required',
                'password' => 'required|min:6|confirmed',                
                'roles' => 'required'
                ]);

                $user = new User;
                $user->first_name = $request->input('first_name');
                $user->last_name = $request->input('last_name');
                $user->username = $request->input('username');
                $user->email = $request->input('email');                                     
                $user->password = Hash::make($request->input('password'));                
                $user->gender = $request->input('gender');                
                $user->identity = $request->input('roles');
                $user->active = 0;
                $user->save();
                return redirect('/admin/view');
            }
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }        
    }


    //problem on updating the users
     public function update_users(Request $request, $id){
        
        if(Session::has('adminsession')){

            if($request->isMethod('get')){

                $user = User::find($id);
                return view('Admin.admin_update')->with('users',$user);

             }else{

                $this->validate($request,[
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|  unique:users',
                'gender' => 'required',
                'password_confirmation' => 'required',
                'password' => 'required|min:6|confirmed',                
                'roles' => 'required',
                'active' => 'required'
                ]);

                $user = User::find($id);
                $user->first_name = $request->input('first_name');
                $user->last_name = $request->input('last_name');
                $user->username = $request->input('username');
                $user->email = $request->input('email');                                     
                $user->password = Hash::make($request->input('password'));                
                $user->gender = $request->input('gender');                
                $user->identity = $request->input('roles');
                $user->active = 1;
                $user->save();
                return redirect('/admin/view');
            }
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }        
    }

    //to view every data as a table in admin panel...
    public function view(){
        if(Session::has('adminsession')){
            $users = User::orderBy('created_at','desc')->get();
            return view('Admin.admin_viewusers')->with('users',$users);
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');        
        }    
    }

    //to show the form to add the menu for navbar...
    public function add_menu(Request $request){

        if(Session::has('adminsession')){
            if($request->isMethod('get')){     
                echo "hello world";            
                return view('Admin.admin_menu')->with('highlight','admin_menu');
            }else{
                $this->validate($request,[
                'title' => 'required|string|max:255',
                'active' => 'required'
                ]);

                //$menu = new Menu;
                //$menu->title = $request->input('title');
                //$menu->active = $request->input('active');                
                //$menu->save();               
                echo $request->input('title') + $request->input('status');
                //return redirect('/admin/view');

            }
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }    
    }
}