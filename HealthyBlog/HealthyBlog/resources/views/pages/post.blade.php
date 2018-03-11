@extends('layouts.default')
@section('title', 'Post')

@section('content')
    <a href="{{'/'}}" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <h2>Add Post</h2>
        <p>Create post with this form</p>
        <form action="{{route('submit.post')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="title">Subject: <sup>*</sup></label>
                <select name="subject" class="form-control form-control-lg">
                    <option value="йога">йога</option>
                    <option value="здравословно">здравословно</option>
                    <option value="хоби">хоби</option>
                    <option value="музика">музика</option>
                    <option value="блог">блог</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title: <sup>*</sup></label>
                <input type="text" name="title" class="form-control form-control-lg">
            </div>

            <div class="form-group">
                <label for="body">Description: <sup>*</sup></label>
                <textarea name="description" class="form-control form-control-lg"></textarea>

            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
@endsection