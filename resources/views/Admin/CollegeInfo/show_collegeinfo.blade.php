@extends('Admin.adminLayout.admin_design')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

	<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->

		@if(Session::has('flash_msg_err'))
			<div class="alert alert-danger alert-block">
				<button type="button" class="close" data-dismiss="alert">x</button>
				<strong>{{ Session('flash_msg_err') }}</strong>								
			</div>					
		@endif

		 @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">College List</h1>
			</div>
		</div><!--/.row-->				
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">College Table</div>
					<div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						        <th data-field="id" >ID</th>
						        <th data-field="college_name" >College Name</th>
						        <th data-field="logo" >Logo</th>
						        <th data-field="email" >Email</th>
						        <th data-field="contact_no" >Contact No</th>
						        <th data-field="address" >Address</th>
						        <th data-field="facebook_link" >Facebook</th>
                                <th data-field="status" >Status</th>		
                                <th data-field="action" colspan="2">Action</th>				         
						    </tr>
						    </thead>
						    @foreach($college_info as $college)
						    <tr>
						    	<td>{{$college->id}}</td>
						    	<td>{{$college->college_name}}</td>
						    	<td>{{$college->logo}}</td>
						    	<td>{{$college->email}}</td>
						    	<td>{{$college->contact_no}}</td>
						    	<td>{{$college->address}}</td>
						    	<td>{{$college->facebook_link}}</td>
						    	@if($college->status == 0)
						    		<td><button type="button" class="btn btn-danger">inactive</button></td>
						    	@else<td><button class="btn btn-success">active</button></td>	
						    	@endif
						    	 <td >
                                    <!-- {{-- <a href="/CollegeInfo/update_collegeinfo/{{ $college->id }}"> --}} -->
                                    <a href="/college_info/{{ $college->id }}/edit">
								    		<button type="button" class = 'btn btn-primary'>Update
								    		</button>								    		
							    		</a>
							    	</td>
						    </tr>
						    @endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection