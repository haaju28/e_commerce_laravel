@section('title')
    About web
@endsection
@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper" style="min-height: 823px;">
        @if (session('message'))
            <div class="alert alert-success text-center" id="message">
                {{ session('message')}}
            </div>
        @endif
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
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
                    <h3 class="card-title">Website information - About</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('about.update',[$about->id]) }}" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="first_title">Title 1</label>
                              <input type="text" class="form-control" name="first_title" id="first_title" value="{{$about->first_title}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="first_image">Image 1</label>
                                <input type="file"  class="form-control" id="first_image" name="first_image" value="{{$about->first_image}}">
                                @error('first_image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <img width="300px" height="200px" src="{{asset("images/$about->first_image")}}" alt="{{$about->first_title}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="first_content">Content 1</label>
                                <textarea class="form-control" id="first_content" name="first_content" rows="3">{!! $about->first_content !!}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="second_title">Title 2</label>
                              <input type="text" class="form-control" name="second_title" id="second_title" value="{{$about->second_title}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="second_image">Image 2</label>
                                <input type="file" class="form-control" id="second_image" name="second_image" value="{{$about->second_image}}">
                                @error('second_image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <img width="300px" height="200px" src="{{asset("images/$about->second_image")}}" alt="{{$about->second_title}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="second_content">Content 2</label>
                                <textarea class="form-control" id="second_content" name="second_content" rows="3">{!! $about->second_content !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
@section('js-custom')
<script>
    setTimeout(() => {
        const box = document.getElementById('message');
        box.style.display = 'none';
    }, 2000);
</script>
@endsection
