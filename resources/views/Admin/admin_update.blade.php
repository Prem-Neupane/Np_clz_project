@extends('layouts.adminLayout.admin_design')
@section('content')

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Update Users</li>
			</ol>
		</div><!--/.row-->

	    <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">User Form</h1>
			</div>
	    </div><!--/.row-->
				
		@if(count($errors) > 0)
		  @foreach($errors->all() as $error)
		  	<div class="alert alert-danger"> {{ $error }}</div>
		  @endforeach
		@endif

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Update User</div>
					<div class="panel-body">
						<div class="col-md-12">							
							
 							<form role="form" method="post" action = 
							"{{ route('admin.update',['id' => $users ]) }}" >

							{{-- error on updating the data...check the url above --}}

							{{ csrf_field() }}
							
								<div class="form-group">
									<label>First Name</label>
									<input class="form-control" value="{{ $users->first_name }}" name = 'first_name' placeholder="Enter your first name">
								</div>			

								<div class="form-group">
									<label>Last Name</label>
									<input class="form-control" value="{{ $users->last_name }}" name = 'last_name' placeholder="Enter your last name">
								</div>

								<div class="form-group">									
									<label>Username</label>
									<input class="form-control" value="{{ $users->username }}" name = 'username' placeholder="Enter your Username">
								</div>

								<div class="form-group">									
									<label>E-mail</label>
									<input class="form-control" value="{{ $users->email}}"
									name = 'email'placeholder="Enter your Email">
								</div>

								<div class="form-group">
									<label>Password</label>
									<input type="password" name = 'password' class="form-control">
								</div>
																
								<div class="form-group">
									<label>Confirm Password</label>
									<input type="password" name = 'password_confirmation' class="form-control">
								</div>																
																				
								{{-- need to display the previous roles and genders... --}}
								<div class="form-group">
									<label>Roles</label>*
									<select class="form-control" value={{ $users->identity }} name = 'roles'>
										

									   	<option>Admin </option>						
										<option>Student</option>
										<option>Teacher</option>											
									</select>
								</div>

								<div class="form-group">
									<label>Gender</label>*
									<div class="radio">
										<label>
											<input type="radio" name="gender" id="optionsRadios1" value="1" checked>Male
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="gender" id="optionsRadios2" value="0">Female
										</label>
									</div>									
								</div>

								<div class="form-group">
									<label>Active</label>
									<div class="radio">
										<label>
											<input type="radio" name="active" id="optionsRadios1" value="0" checked>Inactive
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="active" id="optionsRadios2" value="1">Active
										</label>
									</div>									
								</div>

								<button type="submit" class="btn btn-primary">Submit</button>																				
							</div>
						
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->

	</div><!--/.main-->
@endsection