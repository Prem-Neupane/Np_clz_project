@extends('layouts.adminLayout.admin_design')
@section('content')

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Add User</li>
			</ol>
		</div><!--/.row-->

	    <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">User Registration Form</h1>
			</div>
	    </div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Add User</div>
					<div class="panel-body">
						<div class="col-md-12">
							<form role="form">
							
								<div class="form-group">
									<label>First Name</label>
									<input class="form-control" placeholder="Enter your name">
								</div>			

								<div class="form-group">
									<label>Last Name</label>
									<input class="form-control" placeholder="Enter your name">
								</div>

								<div class="form-group">									
									<label>Username</label>
									<input class="form-control" placeholder="Enter your Username">
								</div>

								<div class="form-group">									
									<label>E-mail</label>
									<input class="form-control" placeholder="Enter your Email">
								</div>

								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control">
								</div>
																
								<div class="form-group">
									<label>Re-enter Password</label>
									<input type="password" class="form-control">
								</div>																
																
								{{-- <div class="form-group">
									<label>Choose your profile picture</label>
									<input type="file">
									 <p class="help-block">to do...</p>
								</div> --}}


								{{-- added a select option --}}
								<div class="form-group">
									<label>Roles</label>
									<select class="form-control">
										<option>Student</option>
										<option>Teacher</option>
										<option>Admin</option>										
									</select>
								</div>

								<div class="form-group">
									<label>Gender</label>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Male
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Female
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