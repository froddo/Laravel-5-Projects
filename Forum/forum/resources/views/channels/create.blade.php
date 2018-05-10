@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Create a new channel</div>

        <div class="panel-body">
            <form action="{{ route('channels.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="channel">Channel</label>
                    <input type="text" name="channel" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">
                            Save Channel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
