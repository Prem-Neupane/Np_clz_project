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

	    @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
								
		<div class="row col-lg-12">
			<div class="col-lg-6">
				<div class="panel panel-default">
				<div class="panel-heading">Add menu</div>
					<div class="panel-body">
					<div class="col-md-12">
						
						<form action="{{route('menu.store')}}" method="post">
							{{ csrf_field() }}				
							<div class="form-group">
								<label>Title</label>
								<input class="form-control" name="title" placeholder="Enter the title for the menu">
							</div>	

							<div class="form-group">
								<label>Slug</label>
								<input class="form-control" name="slug" placeholder="Enter the title for the menu">
							</div>		
																						
							<div class="form-group">
								<label>Status</label>
								<div class="radio">
									<label>
										<input type="radio" name="status" id="optionsRadios1" value="1" checked>Active
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="status" id="optionsRadios2" value="0">Inactive
									</label>
								</div>									
							</div>

							<button type="submit" class="btn btn-primary">Submit</button>																
						</form>
					</div>	
					</div>
				</div>	
			</div>	

			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">Add sub-menu</div>
					<div class="panel-body">
					<div class="col-md-12">
						<form action="{{route('submenu.store')}}" method="post">

							{{ csrf_field() }}
						
							<div class="form-group">
								<label>Title</label>
								<input class="form-control" name="title" placeholder="Enter the title for the submenu">
							</div>	

							<div class="form-group">
								<label>Slug</label>
								<input class="form-control" name="slug" placeholder="Enter the slug for the menu">
							</div>

							<div class="form-group">
								<label>Choose category</label>
								<select class="form-control" name = 'parent_menu_id'>
								    @foreach($menus as $menu)
								    	<option value="{{ $menu->id }}">
								    		<?php
								    	        echo $menu->id.' '.$menu->title;
								    	    ?>
								    	</option>
								    @endforeach										
								</select>									
							</div>		
																						
							<div class="form-group">
								<label>Status</label>
								<div class="radio">
									<label>
										<input type="radio" name="status" id="optionsRadios1" value="1" checked>Active
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="status" id="optionsRadios2" value="0">Inactive
									</label>
								</div>									
							</div>

							<button type="submit" class="btn btn-primary">Submit</button>																				
						</form>
					</div>					
					</div>
				</div>	
			</div><!-- /.col-->
		</div><!-- /.row -->

	</div><!--/.main-->
@endsection