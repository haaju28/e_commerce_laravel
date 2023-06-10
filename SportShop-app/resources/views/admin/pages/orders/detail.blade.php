@section('title')
    Order Detail
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
                    <h3 class="card-title">View Order</h3>
                </div>
                <form role="form" method="POST" action="{{route('order.update',[$orders->id])}}" enctype="multipart/form-data" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="id">ID</label>
                              <input disabled type="text" class="form-control" name="id" id="id" value="{{$orders->id}}">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="user">Customer</label>
                              <input disabled type="text" class="form-control" id="user" name="user" value="{{$orders->name}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="pending" {{$orders->status === 'pending' ? 'selected' : ''}}>pending</option>
                                    <option value="done" {{$orders->status === 'done' ? 'selected' : ''}}>done</option>
                                    <option value="cancel" {{$orders->status === 'cancel' ? 'selected' : ''}}>cancel</option>
                                    <option value="processing" {{$orders->status === 'processing' ? 'selected' : ''}}>processing</option>
                                </select>
                                {{-- <input type="text" class="form-control" id="status" name="status" value="{{$orders->status}}">                               --}}
                            </div>
                            <div class="form-group col-md-3">
                                <label for="created_at">Date</label>
                                <input disabled type="text" class="form-control" id="created_at" name="created_at" value="{{$orders->created_at}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="address">Address</label>
                              <input disabled type="text" class="form-control" name="address" id="address" value="{{$orders->address}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="phone">Phone</label>
                                <input disabled type="text" class="form-control" id="phone" name="phone" value="{{$orders->phone}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="payment_provider">Payment method</label>
                                <input disabled type="text" class="form-control" id="payment_provider" name="payment_provider" value="{{$orders->payment_provider}}">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="total_balance">Order value</label>
                              <input disabled type="text" class="form-control" id="total_balance" name="total_balance" value="{{number_format($orders->total_balance, 0, ',', '.') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12">
                                <table id="example1"
                                    class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc text-center" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Product</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Browser: activate to sort column ascending">
                                                Name
                                            </th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">
                                                Size</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending">
                                            Color</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Engine version: activate to sort column ascending">
                                                Price</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending">Quantity</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">Total</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $orderItems as $orderItem )
                                            <tr>
                                                <td class="text-center">
                                                    <img class="img-thumbnail" width="100px" height="100px" src="{{asset("images/$orderItem->proImage")}}" alt="{{$orderItem->proName}}">
                                                </td>
                                                <td class="text-center">{{$orderItem->proName}}</td>
                                                <td class="text-center">{{$orderItem->proSize}}</td>
                                                <td class="text-center">{{$orderItem->proColor}}</td>
                                                <td class="text-center">{{$orderItem->price}}</td>
                                                <td class="text-center">{{$orderItem->quantity}}</td>
                                                <td class="text-center">{{number_format($orderItem->price * $orderItem->quantity, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    <!-- DataTables -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        });
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
    </script>
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
@endsection