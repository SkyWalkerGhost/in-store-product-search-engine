@extends('layouts.app')
	
	@section('site_title', 'პროდუქციის კატეგორიის დამატება')

	@section('content')
        
        <h1 class="h1"> <i class="icon-tags"></i> კატეგორიის დამატება </h1>	
		<hr class="mb-5">
        
        <div class="container">
			<div class="row">

				<div class="col-md-9">
					@include('include.messages')
				</div>

				<div class="col-md-12">
					

			        {!! Form::open(['action' => ['CategoryController@store'], 'method' => 'POST']) !!}

			        <div class="row">

			        	<div class="col-md-9">
				        	<div class="form-group">
						        {!! Form::text('product_category', '', ['class' => 'form-control', 'placeholder' => 'შეიყვანე კატეგორიის სახელი']) !!}
				        	</div>
			        	</div>

			        	<div class="col-md-3">
			        		<div class="form-group">
			        			{{ Form::button('<i class="icon-check"></i> კატეგორიის დამატება', ['type' => 'submit', 'class' => 'btn btn-success btn-xs'] )  }}
			        		</div>
			        	</div>

			        </div>

			        {!! Form::close() !!}
			        
				</div>
			</div>        	
        </div>



	@stop