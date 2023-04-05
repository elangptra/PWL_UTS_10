<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @extends('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Barang Elang</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Data Barang</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!-- Main row -->
                    <div class="row">
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg">

                            <!-- Calendar -->
                            <div class="card bg-gradient">
                                <div class="card-header border-0">

                                    <h3 class="card-title">
                                        <i class="far fa-calendar-alt"></i>
                                        Message
                                    </h3>
                                    <!-- tools card -->
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-danger btn-sm"
                                            data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <div class="float-right my-2">
                                    <a class="btn btn-success" href="{{ route('barang.create') }}"> Input Barang</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body pt-0">
                                    <!--The calendar -->
                                    
                                    <form class="form" method="GET" action="{{route('search')}}">
                                        <div class="form-group w-100 mb-3">
                                            <label for="search" class="d-block mr-2">Search</label>
                                            <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Input Keyword">
                                            <button type="submit" class="btn btn-primary mb-1">Search</button>
                                        </div>
                                    </form>

                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Kode Barang</th>
                                                <th scope="col">Nama Barang</th>
                                                <th scope="col">Kategori Barang</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        @foreach ($data_barang as $Barang)
                                            <tr>

                                                <td>{{ $Barang->kode_barang }}</td>
                                                <td>{{ $Barang->nama_barang }}</td>
                                                <td>{{ $Barang->kategori_barang }}</td>
                                                <td>{{ $Barang->harga }}</td>
                                                <td>{{ $Barang->qty }}</td>
                                                <td>
                                                    <form action="{{ route('barang.destroy', $Barang->kode_barang) }}"
                                                        method="POST">
                                                        <a class="btn btn-info"
                                                            href="{{ route('barang.show', $Barang->kode_barang) }}">Show</a>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('barang.edit', $Barang->kode_barang) }}">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </section>
                        <!-- right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @extends('layouts.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

</body>

</html>
