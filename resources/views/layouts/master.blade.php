<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    
        <!-- Custom styles for this template-->
    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{asset('sweetalert2/sweetalert2.min.css')}}" rel="stylesheet">
   
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-select/css/bootstrap-select.css')}}" />

</head>


<style>
    body{
        font-family:'century gothic' !important;
    }
    input.floatNumber
    {
        text-align: right;
    }
    .dataTables_wrapper{
        font-size: .8em;
        width: 100% !important;
        
    }
    .dataTable {
        width: 100% !important;
    }
    table.dataTable td {
        font-size: 1em;
        padding: 2px !important;
        vertical-align: middle;
        color: black;
        font-family:'century gothic' !important;
    }
    table.dataTable thead tr {
        font-size: .85em;
        background-color: rgba(41, 40, 40, 0.753);
        color: white;
    }
    .waves-effect{
        font-size: 1em;
        padding:2px;
        margin:0px;
        border-radius: 0%;
    }
</style>
<body   id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('common.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('common.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('common.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger border-0">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Ready to Leave<i class="fas fa-fw fa-question"></i></i></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Thank you for using E-Invoicing.PH! <br> Have a nice and blessed day!<br><br> (Click Logout to confirm)</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('sweetalert2/sweetalert2.all.min.js')}}"></script>
    
    <script type="text/javascript" src="{{ asset('bootstrap-select/js/bootstrap-select.js')}}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap-select/js/ajax-bootstrap-select.js')}}"></script>
    

    {{-- <!-- Page level plugins -->
    <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admin/js/demo/chart-pie-demo.js')}}"></script> --}}

    
   

    @stack('scripts')
    {{-- //integer value validation --}}
    <script>
        $('input.floatNumber').on('input', function() {
            this.value = this.value.replace(/[^0-9.0]/g,'').replace(/(\..*)\./g, '$1');
        });
        $('input.intNumber').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1');
        });
    </script>
</body>

</html>