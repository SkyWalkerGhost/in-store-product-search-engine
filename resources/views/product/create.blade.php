@extends('layouts.app')
	
	@section('content')
		        
        <h1 class="h1"> Create </h1>	
		<hr class="mb-5">
        
        @include('include.messages')

       {{--  {!! Form::open(['action' => 'PostController@store', 'method' => 'POST']) !!}


        {!! Form::close() !!}
 --}}

	@stop