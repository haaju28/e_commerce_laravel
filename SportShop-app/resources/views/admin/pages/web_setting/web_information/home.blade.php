@section('title')
    Web information
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
                    <h3 class="card-title">Website information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('web-setting.update',[$webInfors->id]) }}" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('PUT')

                    <section style="background-color: #eee;">
                        <div class="container py-5">
                      
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="card mb-4">
                                <div class="card-body text-center">
                                  <img src="{{asset("images/$webInfors->logo_img")}}" alt="{{$webInfors->web_name}}"
                                    class="rounded-circle img-fluid" style="width: 150px;">
                                  <h5 class="my-3">{{$webInfors->web_name}}</h5>
                                  <p class="text-muted mb-1">{{$webInfors->email}}</p>
                                  <p class="text-muted mb-4">{{$webInfors->address}}</p>
                                </div>
                              </div>

                              <div class="card mb-4 mb-lg-0">
                                <div class="card-body p-0">
                                  <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <span>Web's name</span>
                                        <input class="form-control" type="text" name="web_name" id="web_name" value="{{$webInfors->web_name}}">
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <span>Logo</span>
                                        <input class="" type="file" name="logo_img" id="logo_img" value="{{$webInfors->logo_img}}">
                                    </li>
                                  </ul>
                                </div>
                              </div>

                            </div>
                            

                            <div class="col-lg-8">
                              <div class="card mb-4">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <input class="text-muted mb-0 form-control" type="text" name="address" id="address" value="{{$webInfors->address}}">
                                    </div>
                                  </div>
                                  <hr>                                 
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="text-muted mb-0 form-control" type="email" name="email" id="email" value="{{$webInfors->email}}">
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="text-muted mb-0 form-control" type="text" name="phone" id="phone" value="{{$webInfors->phone}}">
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Link facebook</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="text-muted mb-0 form-control" type="text" name="facebook_link" id="facebook_link" value="{{$webInfors->facebook_link}}">
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Link google map</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="text-muted mb-0 form-control" type="text" name="gg_map_link" id="gg_map_link" value="{{$webInfors->gg_map_link}}">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </section>

                    <div class="card-footer d-flex justify-content-center">
                        <button onclick="return confirm('Are you sure')" type="submit" class="btn btn-primary">Update</button>
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
