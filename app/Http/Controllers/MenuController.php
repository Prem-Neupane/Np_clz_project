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
        $menu  = Menu::all();
        return $menu;   //return this to a page... @incomp.
    }

    public function create()
    {
        return view('Menu.add_menu');
    }

    public function store(Request $request)
    {

        if( Session::has('adminsession') ){  

            $this->validate($request,[
            'title' => 'required|string|max:255',
            'status' => 'required',                
            ]);

            $menu = new Menu;
            $menu->title = $request->input('title');
            $menu->status = $request->input('status');
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
        //
    }
}
