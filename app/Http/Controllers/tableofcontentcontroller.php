<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TableContent;
use App\Menu;
use App\SubMenu;
use DB;
use Session;
use App\Http\Controllers\Controller;


class tableofcontentcontroller extends Controller
{
      public function index()
    {
    	if (Session::has('adminsession')) {
    		# code...
              $tablecontent=TableContent::all();

            // $content = DB::table('menus')
            //         ->join('contents','menus.id','=','contents.menu_id')

            //         ->select('menus.title as menutitle','contents.*')
            //         ->get();

            return view('tableofcontents.show_table_content')->with("tablecontents",$tablecontent);
    	}else{
    		return redirect('/admin')->with('flash_msg_err','You must login to access');
    	}
    }

    public function create()
    {
    	if(Session::has('adminsession')){
    		return view('tableofcontents.add_table_content')->with('submenus',SubMenu::all())->with('menus',Menu::all());
    	}else{
    		return redirect('/admin')->with('flash_msg_err','You must login to access');
    	}
    }

    public function store(Request $request)
    {
    	if (Session::has('adminsession')) {
    		# code...
            // dd($request);
    		$this->validate($request,[
                'title'=>'required|string|max:255',
                'description'=>'required',
                'status'=>'required',
                'parent_menu_id'=>'required',
                'p_submenu_id'=> 'required'
            ]);

    		$tablecontent = new TableContent;
    		$tablecontent->title = $request->input('title');
    		$tablecontent->description = $request->input('description');
    		$tablecontent->status = $request->input('status');
    		if($request->input('parent_menu_id')!=0)
    			# code...
    			 $tablecontent->menu_id = $request->input('parent_menu_id');


           if($request->input('p_submenu_id')!= 0)
                $tablecontent->submenu_id = $request->input('p_submenu_id');
    		$tablecontent->save();

    		return redirect('/tablecontent/view')->with('success','content added');
    	}else{
    		return redirect('/admin')->with('flash_msg_err','you must login to access');
    	}
    }

    // public function show($id)
    // {

    // }

    public function edit($id)
    {
    	if(Session::has('adminsession')){
    		$tablecontent = TableContent::find($id);
            $menu = Menu::all();
            $submenu = SubMenu::all();
    		return view('tableofcontents.update_table_content')->with('menus',$menu)->with('submenus',$submenu)->with('tablecontent',$tablecontent);
    	}else{
    		return redirect('/admin')->with('flash_msg_err','You must login to access');
    	}
    }

    public function update(Request $request ,$id)
    {
    	if (Session::has('adminsession')) {
    		# code...
    		$this->validate($request,[
                'title'=>'required|string|max:255',
                'description'=>'required',
                'status'=>'required'
            ]);


    	$tablecontent = TableContent::find($id);
    	$tablecontent->title = $request->input(['title']);
    	$tablecontent->description = $request->input(['description']);
    	$tablecontent->status = $request->input(['status']);
        $tablecontent->menu_id = $request->input('parent_menu_id');
        $tablecontent->submenu_id = $request->input('p_submenu_id');
    	$tablecontent->save();


    	return redirect('/tablecontent/view')->with('success','table content successfully added');
    }else{
    	return redirect('/admin')->with('flash_msg_err','you must login to access');
    }
}

    public function destroy($id)
    {
    	if(Session::has('adminsession')){
    		$tablecontent = TableContent::find($id);
    		$tablecontent->delete();

    		return redirect('/tablecontent/view');
    	}else{
    		return redirect('/admin')->with('flash_msg_err','you must login to access');
    	}

     }

    public function toogle($id)
    {
    	if (Session::has('adminsession')) {
    		# code...
    		$tablecontent = TableContent::find($id);
    		$tablecontent->status = 1 - $tablecontent->status;
            $tablecontent->save();

            return redirect('/tablecontent/view');
    	}else{
            return redirect('/admin')->with('flash_msg_err','you must login to assess');
        }
    }

}
