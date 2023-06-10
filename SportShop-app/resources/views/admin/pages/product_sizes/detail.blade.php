@section('title')
    Size Detail
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
                    <h3 class="card-title">Edit Size</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('size.update',[$sizes->id]) }}" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control {{ $errors->first('name')?'is-invalid':''}}" id="name" name='name' placeholder="Enter color name" value="{{$sizes->name}}">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Show: </label>
                            <select class="form-select" aria-label="Default select example" id="status" name="status">
                                <option {{!$sizes->status ? 'selected':''}} value="1" id="status" name="status">Yes</option>
                                <option {{!$sizes->status ? 'selected':''}} value="0" id="status" name="status">No</option>
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
