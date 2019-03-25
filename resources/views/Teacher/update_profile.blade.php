{{-- @extends('layouts.app') --}}
@extends('Admin/adminLayout/admin_design')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
                <div class="col-lg-12">
                        <h1 class="page-header">Teacher Registration Form</h1>
                </div>
        </div><!--/.row-->
        
        @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
                        
        @if(count($errors) > 0)
          @foreach($errors->all() as $error)
                  <div class="alert alert-danger"> {{ $error }}</div>
          @endforeach
        @endif

        <div class="row">
                <div class="col-lg-12">
                        <div class="panel panel-default">
                                <div class="panel-heading">Your Details</div>
                                <div class="panel-body">
                                        <div class="col-md-12">						
                            
                {{-- Route session --}}
                

         <?php $user = Auth::user(); 
                $id = Auth::user()->id;
         ?>


        {{-- <form role="form" method="post" enctype="multipart/form-data" action = "{{ route('profile.update' , [ 'id' => $teacher ] ) }}" >
         {{ method_field('patch') }}
         {{     @csrf_field()     }} --}}
{!! Form::open(['action'=>['TeacherController@update_profile', 'id'=> $id ],'Method'=>'POST','enctype'=>'multipart/form-data']) !!}
  {{ method_field('patch') }}
<div class="row">
    <div class="form-group col-md-6">
        {{Form::label('first_name','Your First Name')}}
        {{Form::text('first_name',$user->first_name,['class'=>'form-control','placeholder'=>'Your First Name'])}}
    </div>
    
    <div class="form-group col-md-6">
        {{Form::label('name','Your Last Name')}}
        {{Form::text('last_name',$user->last_name,['class'=>'form-control','placeholder'=>'Your First Name'])}}
    </div>

</div>

<div class="row">
    <div class="form-group col-md-6">
        {{Form::label('username','User Name')}}
        {{Form::text('username',$user->username,['class'=>'form-control col-md-6','placeholder'=>'User Name'])}}
    </div>

    <div class="form-group col-md-6">
        {{Form::label('role','User Role')}}
        {{Form::text('role',$user->identity ,['class'=>'form-control col-md-6','placeholder'=>'User Role In this Institution'])}}

</div>
</div>
<div class="row">
       <div class="col-md-6">
                {{Form::label('gender','Gender',['class'=>'col-md-2'])}}
                <div class="col-md-6">
                        @if($user->gender==1)
                <input type="radio" name="gender" value='1' checked> Male<br>
                <input type="radio" name="gender" value='0' > Female<br>              
                @else
                <input type="radio" name="gender" value='0' > Male<br>
                <input type="radio" name="gender" value='1' checked> Female<br>
                @endif
                </div>              
        </div>
        <div class="form-group col-md-6">
                {{Form::label('email','User Email')}}
                {{Form::email('email',$user->email,['class'=>'form-control col-md-6','placeholder'=>'your emailaddress'])}}
        </div>


</div>
<div class="row">
                <div class="col-lg-12">
                        <div class="panel panel-default">
                                <div class="panel-heading">Add Following Details On Your Profile</div>
                                <div class="panel-body">
                                        <div class="col-md-12">	
        

        <div class="row">
                <div class="form-group col-md-6">
                {{Form::label('address','Address')}}
                {{Form::text('address',$teacher->address ,['class'=>'form-control col-md-6','placeholder'=>'Your Address here'])}}
                </div>

                <div class="form-group col-md-6">
                  {{Form::label('contact','Contact Details')}}
                  {{Form::text('phone',$teacher->phone,['class'=>'form-control col-md-6','placeholder'=>'+977 '])}}
                </div>
        </div>
         <div class="row">
                <div class="form-group col-md-6">
                        {{Form::label('facebook','Link Up With Your Facebook Profile')}}
                        {{Form::text('facebook', $teacher->facebook ,['class'=>'form-control col-md-6','placeholder'=>'eg: www.facebook.com/username'])}}
                </div>

                <div class="form-group col-md-6">
                        {{Form::label('linkedin','Link Up With Your Linked-In Profile')}}
                        {{Form::text('linkedin',$teacher->linkedin,['class'=>'form-control col-md-6','placeholder'=>'eg: www.linkedin.com/username'])}}
                </div>
         </div>

         <div class="row">
                <div class="form-group col-md-6">
                  {{Form::label('twitter','Link Up With Your Twitter Profile')}}
                  {{Form::text('twitter',$teacher->twitter ,['class'=>'form-control col-md-6','placeholder'=>'eg: www.twitter.com/username'])}}
                </div>

                <div class="form-group col-md-6">
                        <h5><b>{{form::label('image','Profile Image')}}</b></h5>
                        @if($teacher)
                                <img src="/storage/image/{{$teacher->image}}" id="profile-img-tag" alt="{{$teacher->first_name}} {{$teacher->last_name}}" style="width:375px;height:250px;" />
                                {{form::file('image',['id'=>'image','type'=>'file','class'=>'custom-file-control'] )}}
                        @else
                                <img id="profile-img" src="/storage/image/male_teacher_image.png" alt="Nepathya-Teacher" style="width:375px;height:250px;" />
                                {{form::file('image',['id'=>'image','type'=>'file','class'=>'custom-file-control'] )}}
                        @endif
                </div>
        </div>

       

        <div class="row">
                <div class="form-group">
                        {{Form::label('qualification','Qualification Details')}}
                        {{Form::textarea('qualification',$teacher->qualification ,['id'=>'article-ckeditor1','class'=>'form-control col-md-6','placeholder'=>'Your Address here'])}}
                </div>
     </div>
    
     <div class="row">
                <div class="form-group">
                          {{Form::label('description','Your Full description')}}
                          {{Form::textarea('description',$teacher->description ,['id'=>'article-ckeditor2','class'=>'form-control', 'text'=>'Your Full description'])}}
                </div>
        </div>
        
     {{Form::submit('Submit',['class'=>'btn btn-primary btn-lg','style'=>'width:20%'])}}
{!! Form::close() !!}


@endsection