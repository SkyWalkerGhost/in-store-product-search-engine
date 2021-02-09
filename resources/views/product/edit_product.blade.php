@extends('layouts.app')
	
	@section('site_title', $EditProduct->production_name)

	@section('content')
        
        <h1 class="h1"> რედაქტირება - {{ $EditProduct->production_name }} </h1>	
		<hr class="mb-5">
        
        <div class="col-md-9">
	        @include('include.messages')
        </div>

        <div class="col-md-12">
			{{-- {!! Form::open(['action' => ['CategoryController@update', $EditProductCategory->id], 'method' => 'PUT']) !!} --}}
	        {!! Form::open(['action' => ['ProductController@update', $EditProduct->id ], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

	        <div class="row">


	        	<div class="col-md-12 mb-4">
		        	<div class="form-group">
		        		{!! Form::label('discount', 'თუ პროდუქცია აქციაშია, მიუთითე აქციის პროცენტი (%)', ['class' => 'text-white badge badge-secondary badge-danger p-2', ]) !!}
				        {!! Form::number('discount', '', ['class' => 'form-control', 'placeholder' => 'შეიყვანე აქციის პროცენტი']) !!}
		        	</div>
	        	</div>


	        	<div class="col-md-4">
		        	<div class="form-group">
		        		{!! Form::label('name', 'პროდუქციის სახელი') !!}
				        {!! Form::text('product_name', $EditProduct->production_name, ['class' => 'form-control', 'placeholder' => 'შეიყვანე პროდუქციის სახელი']) !!}
		        	</div>
	        	</div>


	        	<div class="col-md-4">
		        	<div class="form-group">
		        		{!! Form::label('barcode', 'შტრიხ კოდი') !!}
				        {!! Form::text('product_barcode', $EditProduct->barcode, ['class' => 'form-control', 'placeholder' => 'შეიყვანე პროდუქციის შტრიხ კოდი']) !!}
		        	</div>
	        	</div>


	        	<div class="col-md-4">
		        	<div class="form-group">
				        <div class="form-group">
		        		{!! Form::label('product_category', 'პროდუქციის კატეგორია') !!}
				        {!! Form::text('product_category', $EditProduct->category, ['class' => 'form-control', 'placeholder' => 'შეიყვანე პროდუქციის სახელი']) !!}
		        	</div>
		        	</div>
	        	</div>


	        	<div class="col-md-3">
		        	<div class="form-group">
		        		{!! Form::label('number_of_product', 'პროდუქციის რაოდენობა') !!}
				        {!! Form::text('number_of_product', $EditProduct->number_of_product, ['class' => 'form-control', 'placeholder' => 'პროდუქციის რაოდენობა']) !!}
		        	</div>
	        	</div>

	        	<div class="col-md-3">
		        	<div class="form-group">
		        		{!! Form::label('price', 'პროდუქციის (ერთეულის) ფასი') !!}
				        {!! Form::text('product_price', $EditProduct->production_price, ['class' => 'form-control', 'placeholder' => 'პროდუქციის ფასი']) !!}
		        	</div>
	        	</div>

	        	<div class="col-md-3">
		        	<div class="form-group">
		        		{!! Form::label('release_date', 'პროდუქციის გამოშვების თარიღი') !!}
				        {!! Form::text('release_date', mb_substr($EditProduct->release_date, 0, 11), ['class' => 'form-control']) !!}
		        	</div>
	        	</div>

	        	<div class="col-md-3">
		        	<div class="form-group">
		        		{!! Form::label('expiration_date', 'პროდუქციის ვადის გასვლის თარიღი') !!}
				        {!! Form::text('expiration_date', mb_substr($EditProduct->expiration_date, 0, 11), ['class' => 'form-control']) !!}
		        	</div>
	        	</div>

	        	<div class="col-md-12">
		        	<div class="form-group">
		        		{!! Form::label('description', 'პროდუქციის შემადგენლობა') !!}
				        {!! Form::textarea('description', $EditProduct->description, ['class' => 'form-control', 'rows' => 7, 'style' => 'resize:none']) !!}


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
	        			{{ Form::button('<i class="icon-check"></i> პროდუქციის განახლება', ['type' => 'submit', 'class' => 'btn btn-success btn-xs'] )  }}
	        		</div>
	        	</div>

	        </div>

	        {!! Form::close() !!}
			        
		</div>



	@stop