@extends('admin.layouts.admin')

@section('title')
    <title>Book Management</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('books/book.css') }}">
@endsection

@section('js')
    <script src="{{ asset('books/book.js') }}"></script>
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
                        <a href="{{ route('book.create') }}" class="btn btn-success float-right m-2">Add new book</a>
                    </div>

                    <div class="col-md-12">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
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
                                        <td class="book_image">
                                            <img class="book_image_item" src="{{ url($book->image_path) }}" alt="">
                                        </td>
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

                    <div class="col-md-12">
                        {{ $books->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
