@extends('layouts.default')

@section('title','Photo')

@section('content')

    <div class="top-box top-box-a">
        <button class="btnDark" data-target="#addModal">Add Photo</button>
    </div>
    <br>
    <hr>
    <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="post" action="{{route('photos.market')}}" class="form-style-9" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <ul>
                            <li>
                                <label>Title</label>
                                <input type="text" name="title" class="field-style field-full align-none">
                            </li>
                            <li>
                                <label>Upload Photo</label>
                                <input type="file" name="photo" class="field-style field-full align-none">
                            </li>
                            <li>
                                <label>Description</label>
                                <textarea name="description" class="field-style"></textarea>
                            </li>
                            <li>
                                <input type="submit" value="Submit" />
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection