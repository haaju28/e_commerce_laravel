@section('title')
    Add Product
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
                    <h3 class="card-title">Create Product</h3>
                </div>
                
                <form role="form" method="POST" action="{{route('product.store')}}" enctype="multipart/form-data" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                              @error('name')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                            <div class="form-group col-md-3">
                              <label for="slug">Slug</label>
                              <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="image_url">Avartar</label>
                                <input type="file" class="form-control" id="image_url" name="image_url">
                                @error('image_url')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="image">Image</label>
                                <input type="file" multiple class="form-control" id="image" name="image[]">
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="weight">Weight</label>
                              <input type="text" class="form-control" name="weight" id="weight" value="{{old('weight')}}">
                                @error('weight')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="dimensions">Dimensions</label>
                                <input type="text" class="form-control" id="dimensions" name="dimensions" value="{{old('dimensions')}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="materials">Materials</label>
                                <input type="text" class="form-control" id="materials" name="materials" value="{{old('materials')}}">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="product_categories_id">Category</label>
                              <select id="product_categories_id" name="product_categories_id" class="form-control">
                                <option selected>Choose...</option>
                                @foreach ($productCategories as $productCategory)
                                    <option value="{{$productCategory->id}}">{{$productCategory->name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="colors">Color</label>
                                <select id="colors" class="form-select" name="colors[]" multiple aria-label="multiple select example">
                                    @foreach ($colors as $colorItem)
                                        <option value="{{$colorItem->id}}">{{$colorItem->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sizes">Size</label>
                                <select id="sizes" class="form-select" name="sizes[]" multiple aria-label="multiple select example">
                                    @foreach ($sizes as $sizeItem)
                                        <option value="{{$sizeItem->id}}">{{$sizeItem->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="price">Price</label>
                              <input type="text" class="form-control" id="price" name="price" value="{{old('price')}}">
                                @error('price')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="discount_price">Discount price</label>
                                <input type="text" class="form-control" id="discount_price" name="discount_price" value="{{old('discount_price')}}">
                                @error('discount_price')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                            
                            </div>
                            <div class="form-group col-md-3">
                                <label for="qty">Quantity</label>
                                <input type="number" class="form-control" id="qty" name="qty" value="{{old('qty')}}">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="status">Status</label>
                              <select id="status" name="status" class="form-control">
                                <option value="1">Show</option>
                                <option value="0">Not show</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="short_description">Short description</label>
                                <textarea class="form-control" id="short_description" name="short_description" rows="3">{{old('short_description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{old('description')}}</textarea>
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
@section('js-custom')
    <script>
        let myEditor;
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                myEditor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#name').on('keyup', function(){
                let name = $(this).val();
                $.ajax({
                    method:"POST",
                    url:"{{ route('product.get.slug') }}",
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