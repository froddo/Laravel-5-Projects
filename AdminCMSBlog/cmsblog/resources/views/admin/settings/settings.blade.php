@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit blog settings
        </div>

        <div class="panel-body">
            <form action="{{ route('settings.update') }}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Site name</label>
                    <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">About</label>
                    <input type="text" name="about" class="form-control" value="{{ $settings->about }}">
                </div>

                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $settings->address }}">
                </div>

                <div class="form-group">
                    <label for="name">Address info</label>
                    <input type="text" name="address_info" class="form-control" value="{{ $settings->address_info }}">
                </div>

                <div class="form-group">
                    <label for="name">Contact phone</label>
                    <input type="text" name="contact_number" class="form-control" value="{{ $settings->contact_number }}">
                </div>

                <div class="form-group">
                    <label for="name">Number info</label>
                    <input type="text" name="number_info" class="form-control" value="{{ $settings->number_info }}">
                </div>

                <div class="form-group">
                    <label for="name">Contact email</label>
                    <input type="text" name="contact_email" class="form-control" value="{{ $settings->contact_email }}">
                </div>

                <div class="form-group">
                    <label for="name">Email info</label>
                    <input type="text" name="email_info" class="form-control" value="{{ $settings->email_info }}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <input type="submit" class="btn btn-success" value="Update site settings">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection