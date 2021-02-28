@extends('admin.adminlayout.container')

@section('container')

<div class="row">
	<div class="col-lg-12 margin-tb">

		<h1 class="text-center">Create New Crop</h1>

		<div class="pull-left">

			<a class="btn btn-primary" href="{{ route('admin.crop_user_list') }}">Back</a>
			
		</div>
		
	</div>
	

</div>

@if($errors->any())

<div class="alert alert-danger">
	<strong>Whoops!</strong>There were some problems with your input.<br><br>

	<ul>
		
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul> 
	
</div>
@endif

<form action="{{ route('admin.storecrop') }}" method="POST">

	@csrf

	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Name:</strong>
				<input type="text" name="name" class="form-control" placeholder="Name" value="{{ @$crop->name}}">
			</div>
			<input type="hidden" name="id" class="form-control" placeholder="id" value="{{ @$crop->id}}">

			
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Category</strong>
				<input type="text" name="category" class="form-control" placeholder="Category" value="{{ @$crop->category}}">
				
			</div>
			
		</div>

		<!-- <div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Active</strong>
				<input type="text" name="fee" class="form-control" placeholder="Fee">
				
			</div>
			
		</div> -->

		<div class="col-xs-12 col-sm-12 col-md-12 text-center">

			<button type="submit" class="btn btn-primary">Submit</button>
			
		</div>


		
	</div>
	
</form>
@endsection