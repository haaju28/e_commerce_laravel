@section('title')
    User Detail
@endsection
@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper" style="min-height: 823px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Product v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">User Detail</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{ route('user.update',[$users->id]) }}" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input disabled type="text" class="form-control {{ $errors->first('name')?'is-invalid':''}}" id="name" name='name' placeholder="Enter user's name" value="{{$users->name}}">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input disabled type="text" class="form-control {{ $errors->first('phone')?'is-invalid':''}}" id="phone" name="phone" placeholder="Enter user's phone" value="{{$users->phone}}">
                            @error('phone')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input disabled type="email" class="form-control {{ $errors->first('email')?'is-invalid':''}}" id="email" name='email' placeholder="Enter user's mail" value="{{$users->email}}">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input disabled type="address" class="form-control {{ $errors->first('address')?'is-invalid':''}}" id="address" name='address' placeholder="Enter user's address" value="{{$users->address}}">
                            @error('address')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status: </label>
                            <select class="form-select" aria-label="Default select example" id="status" name="status">
                                <option {{!$users->status ? 'selected':''}} value="1" id="status" name="status">Active</option>
                                <option {{!$users->status ? 'selected':''}} value="0" id="status" name="status">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role">Role: </label>
                            <select class="form-select" aria-label="Default select example" id="role" name="role">
                                <option {{!$users->role ? 'selected':''}} value="1" id="role" name="role">Admin</option>
                                <option {{!$users->role ? 'selected':''}} value="0" id="role" name="role">User</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
