<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class PostsController extends Controller
{    


    public function index(){
      
        return view('layouts.app')
                            ->with('title',"Nepathya")
                            ->with('menus',Menu::where('status','=',1)->get());
                            // ->with('submenus',SubMenu::where('status','=',1)->get());
    }

    public function homes(){
    	return view('Pages.homes')
    						->with('title',"Nepathya")
                            ->with('menus',Menu::where('status','=',1)->get());;
    }
  
}
