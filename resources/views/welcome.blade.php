@extends('layouts.app')

	@section('site_title', 'პროდუქცია')

	@section('content')
	
		<div class="container">
			
			<h1 class="h1"> პროდუქცია </h1>
			<hr>

			@include('include.messages')

			<div class="row mt-5">
				<div class="col-md-12 mb-5">
						
					{!! Form::open(['action' => 'ProductController@search', 'method' => 'GET']) !!}

					<div class="row">
						
						<div class="col-md-10">
							<div class="form-group">
							{!! Form::text('search_product', '', ['class' => 'form-control', 'placeholder' => 'შეიყვანე შტრიხ კოდი ან პროდუქციის სახელი']) !!}
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								<button class="btn btn-success w-100">
									<i class="icon-search"></i> ძიება
								</button>
							</div>
						</div>

					</div>

        			{!! Form::close() !!}



				</div>


				<div class="col-md-12">
					
					@if(count($SearchResult) > 0)

						<h2 class="h2 text-center mb-2">
							პროდუქტები: {{ count($SearchResult) }}
						</h2>
				
						@foreach($SearchResult AS $ProductNumber => $search)
							<div class="card mb-3">

							  <div class="card-header">

							    {{ $search->production_name }}
							    <div class="float-sm-right">
							    	<span class="mr-2"> შტრიხ კოდი: {{ $search->barcode }} </span>
							    	<span> რაოდენობა: {{ $search->number_of_product }} </span>
							    </div>


							  </div>

							  <div class="card-body">
							  	<div class="row">
							  		<div class="col-md-2">
							  			
							  			<img 	src="storage/{{ str_replace("public/", '', $search->production_image) }}" 
							  					alt="" 
							  					style="width: 100px; height: 100px;"> 
							  		</div>
							  		
							  		<div class="col-md-9">
							    		<p class="card-text"> {{ $search->description }} </p>
							  		</div>

							  	</div>
							  </div>

							  <div class="card-footer text-muted">

							  	
							    <span class="text-primary mr-5">
							    	<i class="icon-calendar-plus-o"></i> გამოშვების თარიღი: {{ mb_substr($search->release_date, 0, 11) }}
							    </span>

							    <span class="text-danger">
							    	<i class="icon-calendar-minus-o"></i> ვადის გასვლის თარიღი: {{ mb_substr($search->expiration_date, 0, 11) }}
							    </span>

							    <div class="float-sm-right">
							    	
							    	@if($search->discount == 0)
								    	<span class="badge badge-success p-2 mr-2" style="font-size: 15px;">
								    		ფასი: {{ $search->production_price }}<sup>₾</sup>
								    	</span>
								    @else
								    	<span class="badge badge-success p-2 mr-2" style="font-size: 15px; text-decoration: line-through; text-decoration-color: red;">
								    		ფასი: {{ $search->production_price }}<sup>₾</sup>
								    	</span>
								    @endif

							    	@if($search->discount == 0)
								    	{{-- do nothing --}}
								    @else
								    	<span class="badge badge-danger p-2 mr-2" style="font-size: 15px;">
								    		აქცია: {{ $search->discount }}<sup>-{{ number_format($search->production_price - $search->discount, 2, '.', '.') }}₾</sup>
								    	</span>
							    	@endif

							    </div>

							  </div>

							</div>
						@endforeach

						@else
						<div class="alert alert-danger text-center">
							პროდუქცია არ არის
						</div>
				
					@endif
				
				</div>



			</div>

		</div>

	@endsection
