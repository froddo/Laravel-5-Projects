@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard <span class="pull-right"><a href="/listings/create" class="btn btn-success btn-xs">Add Listing</a></span></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Your Listings</h3>
                    @if(count($listings) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Company</th>
                                <th></th>
                                <th></th>
                            </tr>
                                @foreach($listings as $listing)
                                    <tr>
                                        <td><a href="/listings/{{$listing->id}}">{{$listing->name}}</a></td>
                                        <td><a class="pull-right btn btn-default" href="/listings/{{$listing->id}}/edit">Edit</a></td>
                                        <td>
                                            {!! Form::open(['action' => ['ListingsController@destroy', $listing->id], 'method' => 'POST', 'class' => 'pull-left','onsubmit' => 'return confirm("Are you sure?")'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::bsSubmit('Delete', ['class' => 'btn btn-danger'])}}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                        @else
                            <p>No Listings Found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
