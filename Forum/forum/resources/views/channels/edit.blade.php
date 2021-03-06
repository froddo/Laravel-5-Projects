@extends('layouts.app')

@section('content')
        <div class="panel panel-default">
            <div class="panel-heading">Edit channel</div>

            <div class="panel-body">
                <form action="{{ route('channels.update', [$channel->id]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="channel">Channel</label>
                        <input type="text" name="channel" class="form-control" value="{{ $channel->title }}">
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">
                                Update Channel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection
