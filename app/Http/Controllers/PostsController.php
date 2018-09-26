<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function about(){
    	return view('Pages.about');
     }

    public function homes(){
    	return view('Pages.homes');
    }

    public function programs(){
    	return view('Pages.programs');
    }
}
