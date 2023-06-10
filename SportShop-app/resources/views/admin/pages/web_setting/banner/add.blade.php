@section('title')
    Add Banner
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
                    <h3 class="card-title">Create Banner</h3>
                </div>
                <form role="form" method="POST" action="{{route('banner.store')}}" enctype="multipart/form-data" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="title">Title</label>
                              <input type="text" class="form-control" name="title" id="title">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="sub_title">Sub title</label>
                              <input type="text" class="form-control" id="sub_title" name="sub_title">
                            </div>
                        </div>    
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control">
                                  <option value="1">Show</option>
                                  <option value="0">Not show</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>


            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection