@extends('layouts.app')

@section('content')

    <h1>Home</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium blanditiis commodi, deleniti facere facilis, harum ipsum iure laboriosam libero quo quos ratione repellat rerum soluta sunt veniam vitae. Ipsa, suscipit!</p>
@endsection

@section('sidebar')
    @parent
    <p>This is appended to the sidebar</p>
@endsection