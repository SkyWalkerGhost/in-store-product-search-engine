@extends('layouts.app')

	@section('site_title', 'პროდუქციის კატეგორიები')

	@section('content')
	
		<div class="container">
			
			<h1 class="h1"> <i class="icon-tags"></i> კატეგორიები </h1>
			<hr>

			@include('include.messages')

			<div class="row mt-5">
				<div class="col-md-12">

					@if(count($ProductCategory) > 0)
					
						<table class="table table-hover">
							
							<thead>
								<tr>
									<th> ID </th>
									<th> <i class="icon-tags"></i> კატეგორიის სახელი </th>
									<th> <i class="icon-clock-o"></i> თარიღი </th>
									<th> რედაქტირება </th>
									<th> წაშლა </th>
								</tr>
							</thead>


							<tbody>
								
								@foreach($ProductCategory AS $ID => $category)

									<tr>
										<td> {{ $ID + 1 }} </td>
										<td> {{ $category->category }} </td>
										<td> {{ $category->created_at }} </td>

										<td> 
											<a href="{{ route('edit_category', [$category->id, $category->category] ) }}" class="btn btn-primary btn-sm"> 
												<i class="icon-pencil"></i> რედაქტირება 
											</a> 
											
										</td>
										

										<td> 

											<!-- Button trigger modal -->
											<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop">
												<i class="icon-trash"></i> წაშლა
											</button>

											<!-- Modal -->
											<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="staticBackdropLabel"> გსურთ ამ კატეგორიის წაშლა ? </h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											        {{ $category->category }}
											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-secondary" data-dismiss="modal"> დახურვა </button>
											        {!! Form::open(['action' => ['CategoryController@destroy', $category->id], 'method' => 'POST' ]) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::submit('წაშლა', ['class' => 'btn btn-danger btn-xs']) !!}
                                                    {!! Form::close() !!}
											      </div>
											    </div>
											  </div>
											</div>

									</tr>

								@endforeach
							
							</tbody>

						</table>


					@else 
						<div class="alert alert-danger">
							კატეგორიები არ მოიძებნა
						</div>
					@endif

				</div>
			</div>

		</div>

	@endsection
