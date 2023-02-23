@extends('admin.layouts.admin')

@section('title')
    <title>Book Editing</title>
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
                    <h1>Book Editing</h1>
                </div>

                <div class="col-md-12">
                    <form action="{{ route('book.update', ['id' => $book->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control"
                                name="name" placeholder="Name" value="{{ $book->name }}">
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control"
                                name="price" placeholder="Price" value="{{ $book->price }}">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control"
                                name="description" placeholder="Description" value="{{ $book->description }}">
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
