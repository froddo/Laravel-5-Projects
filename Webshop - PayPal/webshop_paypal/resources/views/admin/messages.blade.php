@extends('layouts.admin')

@section('title', 'Admin Messages')

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header bg-light">
                Admin Messages
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->phone }}</td>
                                <td>{{ $message->message }}</td>
                                <td>{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteMessageModal-{{ $message->id }}">X</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @foreach($messages as $message)
        <!-- Modal -->

        <div class="modal fade" id="deleteMessageModal-{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">You are about to delete message {{ $message->name }}</h4>
                    </div>
                    <div class="modal-body">
                        Are you sure?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No, keep it</button>
                        <form id="deleteComment-{{ $message->id }}" method="post" action="{{ route('deleteMessage', $message->id) }}">@csrf

                            <button type="submit" class="btn btn-primary">Yes, delete it</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
