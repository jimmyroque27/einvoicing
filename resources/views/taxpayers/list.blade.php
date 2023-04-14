@extends('layouts.master')

@section('content')
<div class="container-fluid m-0 p-0">

    <!-- Page Heading -->
   

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow m-0 p-0 rounded-0 mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">List of Sellers</h6> -->
            <div class="d-sm-flex align-items-center justify-content-between  ">
                <h6 class="h3 mb-0 text-gray-800">List of Tax Payers</h6>
                @can('taxpayer-create')
                    <a href="{{route('taxpayers.create')}}" class="btn btn-sm btn-primary" >
                        <i class="fas fa-plus"></i> Add New Tax Payer
                    </a>
                @endcan
            </div>
            
        </div>
        <div class="card-body">
            <div class="table-responsive  table-hover ">
                 
                 
                
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