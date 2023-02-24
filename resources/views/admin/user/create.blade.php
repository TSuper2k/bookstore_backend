@extends('admin.layouts.admin')

@section('title')
    <title>User Management</title>
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
                    <h1>User Creation</h1>
                </div>

                <div class="col-md-12">
                    <form action="{{ route('user.store') }}" method="post">
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
                            <label>Email</label>
                            <input type="email" class="form-control" @error('email') is-invalid @enderror
                                name="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" @error('password') is-invalid @enderror
                                name="password" placeholder="Password" value="">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password Confirm</label>
                            <input type="password" class="form-control" @error('password_confirm') is-invalid @enderror
                                name="password_confirm" placeholder="Password Confirm" value="">
                            @error('password_confirm')
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
