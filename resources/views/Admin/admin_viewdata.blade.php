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
						<table data-toggle="table" data-url="{{ assert('tables/data2.json') }}" >
						    <thead>
						    <tr>
						        <th data-field="id" data-align="right">ID</th>
						        <th data-field="name">Name</th>
						        <th data-field="username">Username</th>
						        <th data-field="email">Email-id</th>
						        <th data-field="role">Role</th>
						        <th data-field="gender">Gender</th>
						        <th data-field="status">Status</th>
						        <th data-field="action">Actions</th>
						    </tr>
						    </thead>
						    @foreach($users as $user)
							    <tr>
							    	<td>{{ $user->id }}</td>
							    	<td>{{ $user->first_name }}</td>
					    			<td>{{ $user->username }}</td>
							    	<td>{{ $user->email }}</td>
							    	<td>{{  $user->identity }}</td>
							    	@if($user->gender == 0)
							    		<td>Female</td>
							    	@else <td> Male </td>
							    	@endif

							    	@if($user->active == 0)
							    		<td>inactive</td>
							    	@else <td> active </td>
							    	@endif

							    	<td>{{ $user->actions }}</td>				    	
							    </tr>
						    @endforeach
						    
						</table>
					</div>
				</div>
			</div>			
		</div><!--/.row-->			
		
	</div><!--/.main-->

@endsection
