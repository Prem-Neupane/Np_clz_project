<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CollegeInfo;
use Session;

class CollegeInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if(Session::has('adminsession')){            
            $college_info  = CollegeInfo::all();
            return view('Admin.CollegeInfo.show_collegeinfo')->with("college_info",$college_info);   
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
        //
         if( Session::has('adminsession') ){
            return view('Admin.CollegeInfo.add_collegeinfo');
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
            'college_name' => 'required|string|max:255',
            'logo' => 'required|string|max:255',
            'status' => 'required',                
            ]);            

            $college_info = new CollegeInfo;
            $college_info->college_name = $request->input('college_name');
            $college_info->logo = $request->input('logo');
            $college_info->email = $request->input('email');
            $college_info->contact_no = $request->input('contact_no');
            $college_info->address = $request->input('address');
            $college_info->status = $request->input('status');
            $college_info->facebook_link = $request->input('facebook_link');
            $college_info->save();

             return redirect('/college_info/view')->with('success','college_info added');

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
          if(Session::has('adminsession')){            
            $college_info  = CollegeInfo::find($id);
            return view('Admin.CollegeInfo.update_collegeinfo')->with("college_info",$college_info);   
        }else{
            return redirect('/admin')
                    ->with('flash_msg_err','You must login to access');                                
        }
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
        if( Session::has('adminsession') ){  

            $this->validate($request,[
            'college_name' => 'required|string|max:255',
            'logo' => 'required|string|max:255',
            'status' => 'required',                
            ]);            

            $college_info = CollegeInfo::find($id);
            $college_info->college_name = $request->input('college_name');
            $college_info->logo = $request->input('logo');
            $college_info->email = $request->input('email');
            $college_info->contact_no = $request->input('contact_no');
            $college_info->address = $request->input('address');
            $college_info->status = $request->input('status');
            $college_info->facebook_link = $request->input('facebook_link');
            $college_info->save();

             return redirect('/college_info/view')->with('success','college_info updated');

        }else{            
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
