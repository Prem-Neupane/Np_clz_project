@extends('layouts.adminLayout.admin_design')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">User List</h1>
			</div>
		</div><!--/.row-->				
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">User Table</div>
					<div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						        <th data-field="id" style="text-align: center">ID</th>
						        <th data-field="name" style="text-align: center">Name</th>
						        <th data-field="username" style="text-align: center">Username</th>
						        <th data-field="email" style="text-align: center">Email-id</th>
						        <th data-field="role" style="text-align: center">Role</th>
						        <th data-field="gender" style="text-align: center">Gender</th>
						        <th data-field="status" style="text-align: center">Status</th>
						        <th data-field="action" style="text-align: center" colspan="2">Actions</th>
						    </tr>
						    </thead>
						    @foreach($users as $user)
							    <tr>
							    	<td style="text-align: center">{{ $user->id }}</td>
							    	<td style="text-align: center">{{ $user->first_name }}</td>
					    			<td style="text-align: center">{{ $user->username }}</td>
							    	<td style="text-align: center">{{ $user->email }}</td>
							    	<td style="text-align: center">{{ $user->identity }}</td>
							    	@if($user->gender == 0)
							    		<td style="text-align: center">Female</td>
							    	@else <td style="text-align: center"> Male </td>
							    	@endif

							    	@if($user->active == 0)
							    		<td style="text-align: center"><button type="button" class = 'btn btn-danger'>inactive</button></td>
							    	@else <td style="text-align: center"> <button class = 'btn btn-success'>active</button> </td>
							    	@endif


							    	<td style="text-align: center"><button type="button" class = 'btn btn-primary'>Update</button></td>
							    	<td style="text-align: center"><button type="button" class = 'btn btn-danger'>Delete</button></td>
							    		
							    </tr>
						    @endforeach
						    
						</table>
					</div>
				</div>
			</div>			
		</div><!--/.row-->			
		
	</div><!--/.main-->

@endsection
