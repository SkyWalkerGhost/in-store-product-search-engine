@extends('layouts.app')
	
	@section('site_title', 'ყველა პროდუქცია')

	@section('content')
        
        <h1 class="h1"> <i class="icon-suitacse"></i> პროდუქცია ({{ $NumberOfProduct }}) </h1>	
		<hr class="mb-5">
        
        <div class="container">
			<div class="row">

				<div class="col-md-9">
					@include('include.messages')
				</div>

				<div class="col-md-12">
				
				<div class="table-responsive">
					
					@if(count($AllProduct) > 0)
						
						<div class="mb-3">
							{{ $AllProduct->links() }}
						</div>

						<table class="table table-hover">
								
							<thead>
								<tr>
									<th> ID </th>
									<th> სურათი </th>
									<th> სახელი </th>
									<th> კატეგორია </th>
									<th> აღწერა </th>
									<th> რაოდ. </th>
									<th> ფასი </th>
									<th> აქცია </th>
									<th> ნახვა </th>
									<th> რედ. </th>
									<th> წაშლა </th>
								</tr>
							</thead>

							<tbody>
								
								@foreach($AllProduct AS $ID => $product)
								
									<tr>
										<td> {{ $ID + 1 }} </td>
										
										<td> 
											<img src="../storage/{{ str_replace("public/", '', $product->production_image) }}" alt="" style="width: 75px; height: 75px;"> 
										</td>
										

										<td>
											
											<a href="#" class="text-primary text-decoration-none" data-toggle="modal" data-target=".bd-example-modal-lg_product_{{ $product->productionid }}">
												{{ $product->production_name }}
											</a>	

											<!-- Modal -->
											<div class="modal fade bd-example-modal-lg_product_{{ $product->productionid }}" id=".bd-example-modal-lg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
											  <div class="modal-dialog modal-lg" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="staticBackdropLabel"> პროდუქტის დამატებითი ინფორმაცია </h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">

											        <p> პროდუქციის ID: {{ $product->productionid }} </p>
											        <p> პროდუქციის შტრიხ კოდი: {{ $product->barcode }} </p>
											        <br>
											        <p> პროდუქციის ინფორმაცია: </p>
											        <p> {{ $product->description }}	</p>
											      
											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-secondary" data-dismiss="modal"> დახურვა </button>
											      </div>
											    </div>
											  </div>
											</div>

										</td>


										
										<td> {{ $product->category }} </td>
										
										<td>
											
											@if(mb_strlen($product->description) > 200)
												{{ mb_substr($product->description, 0, 150).'...' }}
											@else
												{{ $product->description }}
											@endif

										</td>
										
										<td> {{ $product->number_of_product }} </td>
										
										<td> 
											<span class="badge badge-success p-2"> 
												{{ $product->production_price }}<sup>₾</sup>	
											</span> 
										</td>
										
										<td>
											@if($product->discount == 0)
												<sup class="badge badge-danger"> {{ $product->discount }}  </sup>
											@else
												{{ $product->discount }} 
												<sup class="badge badge-danger"> - {{ $product->production_price - $product->discount }} </sup>
											@endif 
										</td>

										<td> 
											<a href="{{ route('show', $product->id) }}" class="btn btn-warning btn-sm"> 
												<i class="icon-eye"></i> 
											</a> 
											
										</td>

										<td> 
											<a href="{{ route('edit_product', $product->id) }}" class="btn btn-primary btn-sm"> 
												<i class="icon-pencil"></i> 
											</a> 
											
										</td>
										

										<td> 

											<!-- Button trigger modal -->
											<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_{{ $product->productionid }}">
												<i class="icon-trash"></i>
											</button>

											<!-- Modal -->
											<div class="modal fade" id="delete_{{ $product->productionid }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="staticBackdropLabel"> გსურთ ამ პროდუქციის წაშლა ? </h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											        {{ $product->production_name }}
											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-secondary" data-dismiss="modal"> დახურვა </button>
											        {!! Form::open(['action' => ['ProductController@destroy', $product->id], 'method' => 'POST' ]) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::submit('წაშლა', ['class' => 'btn btn-danger btn-xs']) !!}
                                                    {!! Form::close() !!}
											      </div>
											    </div>
											  </div>
											</div>
										</td>



									</tr>

								@endforeach


							</tbody>

						</table>
			        @else
			        	<div class="alert alert-danger">
			        		<i class="icon-info"></i> პროდუქცია არ მოიძებნა
			        	</div>
			        @endif

				</div>	
				</div>
			</div>        	
        </div>



	@stop