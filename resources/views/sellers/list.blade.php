@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sellers</h1>
        <a href="{{route('sellers.create')}}" class="btn btn-sm btn-primary" >
            <i class="fas fa-plus"></i> Add New
        </a>
    </div> -->

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">List of Sellers</h6> -->
            <div class="d-sm-flex align-items-center justify-content-between  ">
                <h6 class="h3 mb-0 text-gray-800">List of Sellers</h6>
                <a href="{{route('sellers.create')}}" class="btn btn-sm btn-primary" >
                    <i class="fas fa-plus"></i> Add New
                </a>
            </div>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                 

                
                {{ $dataTable->table() }}
            </div>
 
        </div>
    </div>

</div>


@endsection
@push('scripts')
    <!-- DataTables -->
    <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    {{-- <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script> --}}
    {{$dataTable->scripts()}}
@endpush