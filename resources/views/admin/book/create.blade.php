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
                    <form action="{{ route('book.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control"
                                name="name" placeholder="Name" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control"
                                name="price" placeholder="Price" value="{{ old('price') }}">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control"
                                name="description" placeholder="Description" value="{{ old('description') }}">
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
