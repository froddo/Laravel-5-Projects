@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <a class="btn btn-info" href="/">View Home</a>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{Auth::user()->name}}
                    You are logged in!
                    @if(count($discos) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th><h4 style="font-weight: bold">Disco</h4></th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($discos as $disco)
                            <tr>
                                <td>
                                    {{$disco->disco}}
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <audio controls>
                                        <source src="/storage/disco/{{$disco->disco}}" type="audio/mpeg">
                                    </audio>
                                </td>
                                <td>
                                    {!! Form::open(['action' => ['PostController@destroyDisco', $disco->id], 'method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!! Form::close() !!}
                                </td>
                                <td></td>
                            </tr>
                            @endforeach
                        </table>
                        @else
                        <p>Disco have no music</p>
                    @endif
                        @if(count($rnbs) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th ><h4 style="font-weight: bold">Rnb</h4></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($rnbs as $rnb)

                                    <tr>
                                        <td>
                                            {{$rnb->rnb}}
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <audio controls>
                                                <source src="/storage/rnb/{{$rnb->rnb}}" type="audio/mpeg">
                                            </audio>
                                        </td>
                                        <td>
                                            {!! Form::open(['action' => ['PostController@destroyRnb', $rnb->id], 'method' => 'POST'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                            {!! Form::close() !!}
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </table>
                    @else
                        <p>Rnb have no music</p>
                    @endif
                    @if(count($ballads) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th><h4 style="font-weight: bold">Ballads</h4></th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($ballads as $ballad)

                                <tr>
                                    <td>
                                        {{$ballad->ballads}}
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <audio controls>
                                            <source src="/storage/ballads/{{$ballad->ballads}}" type="audio/mpeg">
                                        </audio>
                                    </td>
                                    <td>
                                        {!! Form::open(['action' => ['PostController@destroyBallad', $ballad->id], 'method' => 'POST'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>Ballads have no music</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
