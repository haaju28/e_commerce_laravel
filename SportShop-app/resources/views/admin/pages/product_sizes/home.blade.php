@section('title')
    Size Management
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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                        <div class="text-right">
                            <button class="btn btn-primary"><a class="text-light" href="{{url('admin/size/create')}}">Add Size</a></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1"
                                        class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc text-center" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    ID</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending">
                                                    Name
                                                </th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending">
                                                    Status
                                                </th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $sizes as $size )
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ $size->name }}</td>
                                                    @if ($size->status)
                                                        <td class="text-center text-success">Active</td>
                                                    @else
                                                        <td class="text-center text-danger">Inactive</td>
                                                    @endif

                                                    <td class="text-center">
                                                        <form method="POST" action="{{ route('size.destroy' ,[$size->id])}}">
                                                            @csrf
                                                            @if (!$size->trashed())
                                                                <a class="btn btn-primary" href="{{ route('size.edit',[$size->id]) }}">Detail</a>
                                                            @endif
                                                            @method('DELETE')
                                                            @if (!$size->trashed())
                                                                <button onclick="return confirm('Are you sure')" type="submit" class="btn btn-danger">Delete</button>
                                                            @endif
                                                        </form>
                                                        @if ($size->trashed())
                                                            <form method="POST" action="{{ route('size.restore', [$size->id] )}}">
                                                                @csrf
                                                                <button onclick="return confirm('Are you sure')" type="submit" class="btn btn-success">Restore</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
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
    <!-- page script -->
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
        setTimeout(() => {
            const box = document.getElementById('message');
            box.style.display = 'none';
        }, 2000);
    </script>
@endsection
