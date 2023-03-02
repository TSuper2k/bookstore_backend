@extends('admin.layouts.admin')

@section('title')
    <title>Order Management</title>
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
                    <h1>Order Management</h1>
                </div>

                {{-- <div class="col-md-12">
                    <a href="" class="btn btn-success float-right m-2"></a>
                </div> --}}

                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User_id</th>
                                <th scope="col">Total price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->id }}</th>
                                    <td>{{ $order->user_id }}</td>
                                    <td>{{ number_format($order->total_price) }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>
                                        <a href=""
                                            class="btn btn-primary">Edit</a>
                                        <a href=""
                                            class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
