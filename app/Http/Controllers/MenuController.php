<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Menu;
use Session;

class MenuController extends Controller
{

    public function index()
    {
        if(Session::has('adminsession')){            
            $menu  = Menu::all();
            return view('Admin.menu.show_menu')->with("menus",$menu);   
        }else{
            return redirect('/admin')
                    ->with('flash_msg_err','You must login to access');                                
        }
    }

    public function create()
    {
        if( Session::has('adminsession') ){
            return view('Admin.menu.add_menu')
                ->with('menus',Menu::all());
        }else{
            
            return redirect('/admin')
                    ->with('flash_msg_err','You must login to access');                    
        }
    }

    public function store(Request $request)
    {

        if( Session::has('adminsession') ){  

            $this->validate($request,[
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'status' => 'required',                
            ]);            

            $menu = new Menu;
            $menu->title = $request->input('title');
            $menu->status = $request->input('status');
            $menu->slug = $request->input('slug');
            $menu->save();

            return redirect('/menus/create')->with('success','menu added');

        }else{
            
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
                
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        if(Session::has('adminsession')){
            
            $menu = Menu::find($id);
            $menu->delete();     

            return redirect('/menu/view');
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
    }

    public function toogle_status($id){

        if(Session::has('adminsession')){
            
            $menu = Menu::find($id);
            $menu->status =  1 - $menu->status;           
            $menu->save();            

            return redirect('/menu/view');
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');        
        }
    }
}
