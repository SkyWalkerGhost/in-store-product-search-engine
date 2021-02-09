@extends('layouts.app')
	
	@section('content')
		
		<h1 class="h1"> Visitors ({{ count($VisitorsData) }}) </h1>	
		<hr class="mb-5">

		@include('include.messages')

		<div class="table-responsive" style="height: 500px;">

		@if(count($VisitorsData) > 0)

			<table class="table table-hover table-head-fixed text-nowrap">
				
				<thead class="thead-dark">
					<tr>
						<th> ID </th>
						<th> IP </th>
						<th> Country </th>
						<th> City </th>
						<th> OS </th>
						<th> Browser </th>
						<th> Status </th>
						<th> Visit </th>
						<th> Show </th>
						<th> Edit </th>
						<th> Delete </th>
					</tr>
				</thead>

				<tbody>
					@foreach($VisitorsData as $ID => $visitor)
						<tr>
							<td> {{ $ID + 1 }} </td>
							<td> {{ $visitor->ip }} </td>
							<td> {{ $visitor->country }} </td>
							<td> {{ $visitor->city }} </td>
							<td> {{ $visitor->os }} </td>
							<td> {{ $visitor->browser }} </td>
							<td> {{ $visitor->status }} </td>
							<td> {{ $visitor->created_at }} </td>

							
							<td>
								<a href="{{ route('show', $visitor->id) }}" class="btn btn-primary text-uppercase btn-sm"> 
									<i class="fa fa-eye"></i>  </a>
							</td>
							
							@if(!Auth::guest())
								@if(Auth::user()->id == $visitor->user_id)
								
								<td>
									<a href="{{ route('edit', $visitor->id) }}" class="btn btn-warning text-uppercase btn-sm"> 
										<i class="fa fa-pencil"></i>  </a>
								</td>

								<td>

									<button type="button" class="btn btn-danger btn-sm text-uppercase" data-toggle="modal" data-target="#action_{{ $visitor->id }}">
									<i class="fa fa-trash"></i> 
									</button>

									<div class="modal fade" id="action_{{ $visitor->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
											
											<div class="modal-header">
												<h5 class="modal-title" id="staticBackdropLabel"> Do you wont to delete ? </h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											
											<div class="modal-body">
												{{ $visitor->ip }}
											</div>
											
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal"> 
														<i class="fa fa-times"></i> Close 
													</button>
												
													{!! Form::open(['action' => ['PostController@destroy', $visitor->id], 'method' => 'POST' ]) !!}
													{!! Form::hidden('_method', 'DELETE') !!}
													{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
													{!! Form::close() !!}
												
												</div>
											</div>
										</div>
									</div>
									
									
								</td>

								@endif
							@endif
							
							
						</tr>
					@endforeach
					
					
				</tbody>
				
			</table>
			
		@else
			<div class="alert alert-danger">
				<i class="fa fa-exclamation-circle"></i> Visitors Not Found
			</div>
		@endif
		</div>

	@stop
