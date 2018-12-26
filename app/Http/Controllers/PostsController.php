<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class PostsController extends Controller
{
    public function about(){
    	return view('Pages.about')
    						->with('title',"NepathyaCms")
                            ->with('menus',Menu::where('status','=',1)->get());;
     }

    public function homes(){
    	return view('Pages.homes')
    						->with('title',"NepathyaCms")
                            ->with('menus',Menu::where('status','=',1)->get());;
    }

    public function programs(){
    	return view('Pages.programs');
    }
}
