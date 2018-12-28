<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\SubMenu;

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
        return view('dashboard')
                            ->with('title',"Nepathya")
                            ->with('menus',Menu::where('status','=',1)->get())
                            ->with('submenus',SubMenu::where('status','=',1)->get());
    }
}
