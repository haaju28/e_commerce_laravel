@section('title')
    Blog Detail
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
                    <h3 class="card-title">Update blog</h3>
                </div>

                <form role="form" method="POST" action="{{route('blog.update',[$blogs->id])}}" enctype="multipart/form-data" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-row">
                            @if ($blogs->image)
                                <div class="form-group col-md-4">
                                    <img class="img-thumbnail" width="100px" height="100px" src="{{asset("images/$blogs->image")}}" alt="{{$blogs->title}}">
                                </div>
                            @else
                                <h5>No image added</h5>
                            @endif
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="title">Title</label>
                              <input type="text" class="form-control" name="title" id="title" value="{{$blogs->title}}">
                              @error('title')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                            <div class="form-group col-md-4">
                              <label for="slug">Slug</label>
                              <input type="text" class="form-control" id="slug" name="slug" value="{{$blogs->slug}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" name="author" id="author" value="{{Auth::user()->name}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="article_category_id">Category</label>
                                <select id="article_category_id" name="article_category_id" class="form-control">
                                  <option value="{{$blogs->article_category_id}}" {{$blogs->article_category_id ? 'selected':''}}>{{$blogs ->article_category->name}}</option>
                                  @foreach ($categories as $category)
                                      <option value="{{$category->id}}">{{$category->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="is_approved">Approve</label>
                                <select id="is_approved" name="is_approved" class="form-control">
                                  <option {{ !$blogs->is_approved ? 'selected':''}} value="1">Yes</option>
                                  <option {{ !$blogs->is_approved ? 'selected':''}} value="0">No</option>
                                </select>
                              </div>
                            <div class="form-group col-md-3">
                              <label for="status">Status</label>
                              <select id="status" name="status" class="form-control">
                                <option {{ !$blogs->status ? 'selected':''}} value="1">Show</option>
                                <option {{ !$blogs->status ? 'selected':''}} value="0">Not show</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="form-group">
                                <label for="short_description">Short description</label>
                                <textarea class="form-control" id="short_description" name="short_description" rows="3">{!! $blogs->short_description !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{!! $blogs->description !!}</textarea>
                                @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror 
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
            $('#title').on('keyup', function(){
                let title = $(this).val();
                $.ajax({
                    method:"POST",
                    url:"{{ route('blog.get.slug') }}",
                    data:{
                        title: title,
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