@extends('layouts.app')
	
	@section('site_title', 'პროდუქციის დამატება')

	@section('content')
        
        <h1 class="h1"> <i class="icon-tags"></i> პროდუქციის დამატება </h1>	
		<hr class="mb-5">
        
        <div class="container">
			<div class="row">

				<div class="col-md-9">
					@include('include.messages')
				</div>

				<div class="col-md-12">
					

			        {!! Form::open(['action' => ['ProductController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

			        <div class="row">


			        	<div class="col-md-4">
				        	<div class="form-group">
				        		{!! Form::label('name', 'პროდუქციის სახელი') !!}
						        {!! Form::text('product_name', old('product_name'), ['class' => 'form-control', 'placeholder' => 'შეიყვანე პროდუქციის სახელი']) !!}
				        	</div>
			        	</div>


			        	<div class="col-md-4">
				        	<div class="form-group">
				        		{!! Form::label('barcode', 'შტრიხ კოდი') !!}
						        {!! Form::text('product_barcode', old('product_barcode'), ['class' => 'form-control', 'placeholder' => 'შეიყვანე პროდუქციის შტრიხ კოდი']) !!}
				        	</div>
			        	</div>


			        	<div class="col-md-4">
				        	<div class="form-group">
				        		{!! Form::label('category', 'პროდუქციის კატეგორია') !!}
						        <select class="form-control" name="product_category">
						        	@foreach($ProductCategory AS $category)
						        		<option value="{{ $category->category }}"> {{ $category->category }} </option>
						        	@endforeach
						        </select>
				        	</div>
			        	</div>


			        	<div class="col-md-3">
				        	<div class="form-group">
				        		{!! Form::label('number_of_product', 'პროდუქციის რაოდენობა') !!}
						        {!! Form::text('number_of_product', old('number_of_product'), ['class' => 'form-control', 'placeholder' => 'პროდუქციის რაოდენობა']) !!}
				        	</div>
			        	</div>

			        	<div class="col-md-3">
				        	<div class="form-group">
				        		{!! Form::label('price', 'პროდუქციის (ერთეულის) ფასი') !!}
						        {!! Form::text('product_price', old('product_price'), ['class' => 'form-control', 'placeholder' => 'პროდუქციის ფასი']) !!}
				        	</div>
			        	</div>

			        	<div class="col-md-3">
				        	<div class="form-group">
				        		{!! Form::label('release_date', 'პროდუქციის გამოშვების თარიღი') !!}
						        {!! Form::date('release_date', '', ['class' => 'form-control']) !!}
				        	</div>
			        	</div>

			        	<div class="col-md-3">
				        	<div class="form-group">
				        		{!! Form::label('expiration_date', 'პროდუქციის ვადის გასვლის თარიღი') !!}
						        {!! Form::date('expiration_date', '', ['class' => 'form-control']) !!}
				        	</div>
			        	</div>

			        	<div class="col-md-12">
				        	<div class="form-group">
				        		{!! Form::label('description', 'პროდუქციის შემადგენლობა') !!}
						        {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => 7, 'style' => 'resize:none']) !!}


				        	</div>
			        	</div>


			        	<div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01"> პროდუქტის სურათი </span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="product_img" class="custom-file-input">
                                {{ Form::label('title', 'Max Size: 1MB', ['class' => 'custom-file-label']) }}
                            </div>
                        	</div>
                    	</div>

			        	<div class="col-md-12">
			        		<div class="form-group">
			        			{{ Form::button('<i class="icon-check"></i> პროდუქციის დამატება', ['type' => 'submit', 'class' => 'btn btn-success btn-xs'] )  }}
			        		</div>
			        	</div>

			        </div>

			        {!! Form::close() !!}
			        
				</div>
			</div>        	
        </div>



	@stop