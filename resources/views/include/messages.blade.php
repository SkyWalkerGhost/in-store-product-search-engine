@if(count($errors) > 0)

    @foreach($errors->all() as $error_message)
        <div class="alert alert-danger text-white border-0" style="background: #dc3545 !important;">
            {{ $error_message }}
        </div>  

    @endforeach
@endif

@if(session('error'))
    <div class="alert alert-danger text-white border-0" style="background: #dc3545 !important;">
        {{ session('error') }}
    </div>
@endif


@if(session('success'))
    <div class="alert alert-success text-white border-0" style="background: #28a745 !important;">
        <i class="icon-check"></i>    {{ session('success') }}
    </div>
@endif
