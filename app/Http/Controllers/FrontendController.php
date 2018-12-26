<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class FrontendController extends Controller
{
    public function index(){
      
        return view('layouts.app')
                            ->with('title',"NepathyaCms")
                            ->with('menus',Menu::where('status','=',1)->get());
                            // ->with('submenus',SubMenu::where('status','=',1)->get());
    }
}
