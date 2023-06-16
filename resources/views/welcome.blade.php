<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('public') }}/img/Logoarkatama.png" type="image/gif" style= "width: 45px; hight:45px"/>
    <title>Arkatama Store</title>
    <!---boostrap 5---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ url('public') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('public') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="{{ url('public') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('public') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('public') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public') }}/dist/css/adminlte.min.css">
    
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('public') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   
   
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ url('public') }}/assetsdepan/img/preloader.gif" alt="AdminLTELogo" height="280"
                width="280">
        </div> --}}

        <!-- Navbar -->
        @include('template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('template.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid ">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
        </div>
        <!-- /.content-wrapper -->

        @include('template.footer')
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
  
        </aside>
        <!-- /.control-sidebar -->
    </div>
</body>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('public') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-----boostrap 5----->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('public') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   
    <!-- jQuery Knob Chart -->
    <script src="{{ url('public') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ url('public') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ url('public') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('public') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="{{ url('public') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('public') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  
    <!-- jQuery -->
    <script src="{{ url('public') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('public') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ url('public') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('public') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('public') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('public') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ url('public') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('public') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ url('public') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ url('public') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ url('public') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ url('public') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('public') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('public') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('public') }}/dist/js/adminlte.min.js"></script>
    {{-- <!-- AdminLTE for demo purposes -->
    <script src="{{ url('public') }}/dist/js/demo.js"></script> --}}
    <!-- Page specific script -->
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>

</body>

</html>
