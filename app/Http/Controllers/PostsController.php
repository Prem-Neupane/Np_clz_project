<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class PostsController extends Controller
{    


    public function index(){
      
        return view('layouts.app')                            
                            ->with('menus',Menu::where('status','=',1)->get());                           
    }

    public function homes(){
    	return view('Pages.homes')    						
                            ->with('menus',Menu::where('status','=',1)->get());                            
    }

    // public function show_content($slug,$slug2 = ""){
    //     if($slug == "myhomes")
    // 	return view('Pages.homes')    						
    //                         ->with('menus',Menu::where('status','=',1)->get());                            
    // }
  
}
