@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="error">
            {{$error}}
        </div>
    @endforeach
@endif

@foreach(['success'] as $key)
    @if(Session::has($key))
        <div class="success">
            {{ Session::get($key) }}
            {{ Session::forget($key) }}
        </div>
    @endif

@endforeach

@foreach(['error'] as $key)
    @if(Session::has($key))
        <div class="error">
            {{ Session::get($key) }}
            {{ Session::forget($key) }}
        </div>
    @endif

@endforeach