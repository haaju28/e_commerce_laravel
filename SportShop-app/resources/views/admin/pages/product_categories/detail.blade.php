@section('title')
    Category Detail
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
                    <h3 class="card-title">Edit Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('product-category.update',[$productCategories->id]) }}" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control {{ $errors->first('name')?'is-invalid':''}}" id="name" name='name' placeholder="Enter category name" value="{{$productCategories->name}}">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="trend">Trend</label>
                            <input type="text" class="form-control {{ $errors->first('trend')?'is-invalid':''}}" id="trend" name='trend' placeholder="Enter category trend" value="{{$productCategories->trend}}">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control {{ $errors->first('slug')?'is-invalid':''}}" id="slug" name='slug' placeholder="Enter slug for category" value="{{$productCategories->slug}}">
                            @error('slug')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="is_show">Show: </label>
                            <select class="form-select" aria-label="Default select example" id="is_show" name="is_show">
                                <option {{!$productCategories->is_show ? 'selected':''}} value="1" id="is_show" name="is_show">Yes</option>
                                <option {{!$productCategories->is_show ? 'selected':''}} value="0" id="is_show" name="is_show">No</option>
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
@section('js-custom')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#name').on('keyup', function(){
                let name = $(this).val();
                $.ajax({
                    method:"POST",
                    url:"{{ route('product.category.get.slug') }}",
                    data:{
                        name: name,
                        _token:"{{ csrf_token() }}"
                    },
                    success: function(res){
                        $('#slug').val(res.slug);
                    },
                    error: function(res){}
                });
            });
        });
    </script>
@endsection