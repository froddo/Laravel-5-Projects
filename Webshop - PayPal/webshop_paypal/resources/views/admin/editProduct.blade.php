@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            Edit Product
                        </div>

                        @include('includes.messages.message')

                        <form action="{{ route('updateProduct', $product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Thumbnail</label>
                                            <input type="file" id="normal-input" name="thumbnail" class="form-control" placeholder="Product thumbnail">
                                        </div>
                                        <img src="{{ asset($product->thumbnail) }}" width="100">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Title</label>
                                            <input type="text" id="normal-input" name="title" value="{{ $product->title }}" class="form-control" placeholder="Product title">
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="placeholder-input" class="form-control-label">Description</label>
                                            <textarea class="form-control" name="description" placeholder="Product description" id="" cols="30" rows="10">{{ $product->description }}</textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Price</label>
                                            <input type="number" id="normal-input" name="price" class="form-control" value="{{ number_format($product->price, 2) }}" placeholder="10.00">
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-success">Update product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection