
@section('title')
    User Management
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
                            <button class="btn btn-primary"><a class="text-light" href="{{url('admin/user/create')}}">Add user</a></button>
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
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Role</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending">
                                                    Email</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">Created at</th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">Status</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $users as $user )
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ $user->name }}</td>
                                                    @if ($user->role)
                                                        <td class="text-center text-success">Admin</td>
                                                    @else
                                                        <td class="text-center text-primary">User</td>
                                                    @endif
                                                    <td class="text-center">{{ $user->email}}</td>
                                                    <td class="text-center">{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                                                    @if ($user->status)
                                                        <td class="text-center text-success">Active</td>
                                                    @else
                                                        <td class="text-center text-danger">Inactive</td>
                                                    @endif

                                                    <td class="text-center d-flex justify-content-center align-item-center">
                                                        <form method="POST" action="{{ route('user.destroy' ,[$user->id])}}">
                                                            @csrf
                                                            <a class="btn btn-primary" href="{{ route('user.edit',[$user->id]) }}">Detail</a>
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure')" type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
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
