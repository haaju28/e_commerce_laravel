@section('title')
    Product Detail
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
                    <h3 class="card-title">Update Product</h3>
                </div>
                <form role="form" method="POST" action="{{route('product.update',[$products->id])}}" enctype="multipart/form-data" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-row">
                            @if ($products->image_product)
                                @foreach ($products->image_product  as $image)
                                    <div class="form-group col-md-3">
                                        <img class="img-thumbnail" width="100px" height="100px" src="{{asset("images/$image->image")}}" alt="{{$products->name}}">
                                        <a onclick="return confirm('Are you sure?')" href="{{url("admin/product-image/$image->id/delete")}}">Remove</a>
                                    </div>
                                @endforeach
                            @else
                                <h5>No image added</h5>
                            @endif
                            <div class="form-group col-md-3">
                                <label for="name">Avatar</label>
                                <img class="img-thumbnail" width="100px" height="100px" src="{{asset("images/$products->image_url")}}" alt="{{$products->name}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" name="name" id="name" value="{{$products->name}}">
                              @error('name')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                            <div class="form-group col-md-3">
                              <label for="slug">Slug</label>
                              <input type="text" class="form-control" id="slug" name="slug" value="{{$products->slug}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="image">Image</label>
                                <input type="file" multiple class="form-control" id="image" name="image[]">
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                              
                            </div>
                            <div class="form-group col-md-3">
                                <label for="image_url">Avartar</label>
                                <input type="file" class="form-control" id="image_url" name="image_url">
                                @error('image_url')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="weight">Weight</label>
                              <input type="number" class="form-control" name="weight" id="weight" value="{{$products->weight}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="dimensions">Dimensions</label>
                                <input type="text" class="form-control" id="dimensions" name="dimensions" value="{{$products->dimensions}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="materials">Materials</label>
                                <input type="text" class="form-control" id="materials" name="materials" value="{{$products->materials}}">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="product_categories_id">Category</label>
                              <select id="product_categories_id" name="product_categories_id" class="form-control">
                                <option value="{{$products->product_categories_id}}" {{$products->product_categories_id ? 'selected':''}}>{{$products->category->name}}</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="colors">Color</label>
                                <select id="colors" class="form-select" name="colors[]" multiple aria-label="multiple select example">
                                    @foreach ($colors as $colorItem)
                                        <option value="{{$colorItem->id}}">{{$colorItem->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="colors">Color selected</label>
                                <div>
                                    @foreach ($products->colors_product as $productColor)
                                        <div>
                                            <span>{{$productColor->color->name}}</span> | <a onclick="return confirm('Are you sure?')" href="{{url("admin/product-color/$productColor->id/delete")}}">remove</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="sizes">Size</label>
                                <select id="sizes" name="sizes[]" class="form-select" multiple aria-label="multiple select example">
                                    @foreach ($sizes as $sizeItem)
                                        <option value="{{$sizeItem->id}}">{{$sizeItem->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="sizes">Size selected</label>
                                <div>
                                    @foreach ($products->sizes_product as $productSize)
                                        <div>
                                            <span>{{$productSize->size->name}}</span> | <a onclick="return confirm('Are you sure?')" href="{{url("admin/product-size/$productSize->id/delete")}}">remove</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="price">Price</label>
                              <input type="number" class="form-control" id="price" name="price" value="{{$products->price}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="discount_price">Discount price</label>
                                <input type="number" class="form-control" id="discount_price" name="discount_price" value="{{$products->discount_price}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="qty">Quantity</label>
                                <input type="number" class="form-control" id="qty" name="qty" value="{{$products->qty}}">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="status">Status</label>
                              <select id="status" name="status" class="form-control">
                                <option {{ !$products->status ? 'selected':''}} value="1">Show</option>
                                <option {{ !$products->status ? 'selected':''}} value="0">Not show</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="short_description">Short description</label>
                                <textarea class="form-control" id="short_description" name="short_description" rows="3">{!! $products->short_description !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">
                                    {!! $products->description !!}
                                </textarea>
                            </div>
                        </div>
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