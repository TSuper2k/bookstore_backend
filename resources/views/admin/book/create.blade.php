@extends('admin.layouts.admin')

@section('title')
    <title>Book Creation</title>
@endsection

@section('css')

@endsection

@section('js')

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.components.content-header')
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Book Creation</h1>
                </div>

                <div class="col-md-12">
                    <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" @error('name') is-invalid @enderror
                                name="name" placeholder="Name" value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file"
                                class="form-control-file" @error('image_path') is-invalid @enderror
                                name="image_path" value="{{ old('image_path') }}">
                            @error('image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" @error('price') is-invalid @enderror
                                name="price" placeholder="Price" value="{{ old('price') }}">
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" @error('description') is-invalid @enderror
                                name="description" placeholder="Description" value="{{ old('description') }}">
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
