@extends('layouts.master')

@section('content')
<div class="container-fluid m-0 p-0 rounded-0">

    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Role List</h1>
        <a href="{{route('admin.role.create')}}" class="btn btn-sm btn-primary" >
            <i class="fas fa-plus"></i> Add New Role
        </a>
    </div> --}}

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow m-0 p-0 rounded-0 mb-4">
        <div class="card-header py-3">
            
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">All Roles</h6>
                @can('role-create')
                    <a href="{{route('admin.role.create')}}" class="btn btn-sm btn-primary" >
                        <i class="fas fa-plus"></i> Add New Role
                    </a>
                @endcan
            </div>
            
        </div>
        <div class="card-body">
            
            {{ $dataTable->table() }}
 
   
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