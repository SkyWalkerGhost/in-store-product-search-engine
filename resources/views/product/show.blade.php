@extends('layouts.app')
	
	@section('site_title', $ShowProduct->production_name)

    @section('content')
        
        <h1 class="h1"> {{ $ShowProduct->production_name }} </h1>	
		<hr class="mb-3">

		<div class="col-md-12">
		<div class="row">
			
			<div class="col-md-4 text-center">
				<a href="{{ route('all_product') }}" class="btn bg-dark text-white"> <i class="icon-arrow-circle-left"></i> უკან დაბრუნება </a>
			</div>

			<div class="col-md-4 text-center">
				<a href="{{ route('edit_product', $ShowProduct->id) }}" class="btn bg-primary text-white"> <i class="icon-pencil"></i> რედაქტირება </a>
			</div>

			<div class="col-md-4 text-center">
				
				<button type="button" class="btn bg-danger text-white" data-toggle="modal" data-target="#delete_{{ $ShowProduct->productionid }}">
					<i class="icon-trash"></i> წაშლა
				</button>

				<!-- Modal -->
				<div class="modal fade" id="delete_{{ $ShowProduct->productionid }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="staticBackdropLabel"> გსურთ ამ პროდუქციის წაშლა ? </h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        {{ $ShowProduct->production_name }}
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal"> დახურვა </button>
				        {!! Form::open(['action' => ['ProductController@destroy', $ShowProduct->id], 'method' => 'POST' ]) !!}
		                {!! Form::hidden('_method', 'DELETE') !!}
		                {!! Form::submit('წაშლა', ['class' => 'btn btn-danger btn-xs']) !!}
		                {!! Form::close() !!}
				      </div>
				    </div>
				  </div>
				</div>
			</div>

			<table class="table table-hover p-3 mb-3 mt-3">
          
          		<tbody>


	            <tr>
	                <th style="width:50%"> 
	                    <strong class="text-dark mr-4"> პროდუქციის სახელი: </strong> 
	                </th>
	                <td> <span> {{ $ShowProduct->production_name }} </span>  </td>
	            </tr>


	            <tr>
	                <th style="width:50%"> 
	                    <strong class="text-dark mr-4"> პროდუქციის აღწერა: </strong> 
	                </th>
	                <td>
	                	{{ $ShowProduct->description }}
     				</td>
	            </tr>

				<tr>
	                <th style="width:50%"> 
	                    <strong class="text-dark mr-4"> პროდუქციის (ერთეულის) ფასი: </strong> 
	                </th>
	                
	                <td> <span class="badge badge-success p-2" style="font-size: 15px;"> 
	                	{{ $ShowProduct->production_price }}<sup>₾</sup> </span>  
	                </td>
	            </tr>

	            <tr>
	                <th style="width:50%"> 
	                    <strong class="text-dark mr-4"> პროდუქციის ფასი კლება: </strong> 
	                </th>
	                
	                <td> <span class="badge badge-warning p-2" style="font-size: 15px;"> 
	                	- {{ $ShowProduct->production_price - $ShowProduct->discount }}<sup>₾</sup> </span>  
	                </td>
	            </tr>


	            <tr>
	                <th style="width:50%"> 
	                    <strong class="text-dark mr-4"> აქცია, ახალი ფასი: </strong> 
	                </th>
	                
	                <td> <span class="badge badge-danger p-2" style="font-size: 15px;"> 
	                	{{ $ShowProduct->discount }}<sup>₾</sup> </span>  
	                </td>
	            </tr>


	            <tr>
	                <th style="width:50%"> 
	                    <strong class="text-dark mr-4"> პროდუქციის სურათი: </strong> 
	                </th>
	                <td>
	                	<img src="../../storage/{{ str_replace("public/", '', $ShowProduct->production_image) }}" 
	                		alt="" style="width: 80px; height: 80px;">
     				</td>
	            </tr>


	            <tr>
	                <th style="width:50%"> 
	                    <strong class="text-dark mr-4"> პროდუქციის შტრიხ კოდი: </strong> 
	                </th>
	                <td> <span> {{ $ShowProduct->barcode }} </span>  </td>
	            </tr>

	            <tr>
	                <th style="width:50%"> 
	                    <strong class="text-dark mr-4"> პროდუქციის კატეგორია: </strong> 
	                </th>
	                <td> <span> {{ $ShowProduct->category }} </span>  </td>
	            </tr>

          
	            <tr>
	                <th style="width:50%"> 
	                    <strong class="text-dark mr-4"> პროდუქციის რაოდენობა: </strong> 
	                </th>
	                <td> <span> {{ $ShowProduct->number_of_product }} </span>  </td>
	            </tr>

          
        
	            <tr>
	                <th style="width:50%"> 
	                    <strong class="text-dark mr-4"> პროდუქციის გამოშვების თარიღი: </strong> 
	                </th>
	                <td> <span> {{ $ShowProduct->release_date }} </span>  </td>
	            </tr>

	            <tr>
	                <th style="width:50%"> 
	                    <strong class="text-dark mr-4"> პროდუქციის ვადის გასვლის თარიღი: </strong> 
	                </th>
	                <td> <span> {{ $ShowProduct->expiration_date }} </span>  </td>
	            </tr>

          
        		</tbody>
      		</table>

      		

		</div>	
		</div>

	@stop