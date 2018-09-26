@extends('layouts.adminLayout.admin_design')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Add Menu</li>
				</ol>
			</div><!--/.row-->

		    <div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Menu</h1>
				</div>
		    </div><!--/.row-->
					
			
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Add menu</div>
						<div class="panel-body">
							<div class="col-md-12">
								<form role="form">
								
									<div class="form-group">
										<label>menu</label>
										<input class="form-control" placeholder="">
									</div>			


									<div class="form-group">									
										<label>submenu</label>
										<input class="form-control" placeholder="">
									</div>								
																								
									<div class="form-group">
										<label>Status</label>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Active
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Inactive
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