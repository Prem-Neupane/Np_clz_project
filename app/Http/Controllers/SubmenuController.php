<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Menu;
use App\SubMenu;
use DB;
use Session;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('adminsession')){            
            $submenu  = DB::table('menus')
                        ->join('submenus','menus.id','=','submenus.parent_id')
                        ->select('menus.title as menutitle', 'submenus.*')                        
                        ->get();            

            return view('Admin.menu.show_submenu')->with("submenus",$submenu);   
        }else{
            return redirect('/admin')
                    ->with('flash_msg_err','You must login to access');                                
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if( Session::has('adminsession') ){
            return view('Admin.menu.add_submenu')
                ->with('menus',Menu::all());
        }else{
            
            return redirect('/admin')
                    ->with('flash_msg_err','You must login to access');                    
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( Session::has('adminsession') ){  

            $this->validate($request,[
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'status' => 'required',
            'parent_menu_id' => 'required',                
            ]);

            $submenu = new SubMenu;
            $submenu->title = $request->input('title');
            $submenu->status = $request->input('status');
            $submenu->slug = $request->input('slug');
            $submenu->parent_id = $request->input('parent_menu_id');
            $submenu->save();

            return redirect('/menus/create')->with('success','submenu added');

        }else{
            
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(Session::has('adminsession')){
            
            $submenu = SubMenu::find($id);            
            $submenu->delete();            

            return redirect('/submenu/view');
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');        
        }
        
    }

     public function toogle_status($id){

        if(Session::has('adminsession')){
            
            $submenu = SubMenu::find($id);
            $submenu->status =  1 - $submenu->status;           
            $submenu->save();            

            return redirect('/submenu/view');
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');        
        }
    }
}
