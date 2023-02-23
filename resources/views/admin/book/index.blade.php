@extends('admin.layouts.admin')

@section('title')
    <title>Book Management</title>
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
                        <h1>Book Management</h1>
                    </div>

                    <div class="col-md-12">
                        <a href="{{ route('book.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <th scope="row">{{ $book->id }}</th>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ number_format($book->price) }}</td>
                                        <td>{{ $book->description }}</td>
                                        <td>
                                            <a href="{{ route('book.edit', ['id' => $book->id]) }}"
                                                class="btn btn-primary">Edit</a>
                                            <a href="{{ route('book.delete', ['id' => $book->id]) }}"
                                                class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
