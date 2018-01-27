@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
@if(Request::is('messages') && session('info'))

    <div class="alert alert-info">
        {{session('info')}}
    </div>
@endif