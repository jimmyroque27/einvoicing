@extends('layouts.master')

@section('content')

<div class="container-fluidm-0 p-0 rounded-0 ">

    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> --}}

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow m-0 p-0 rounded-0 mb-4">
        <div class="card-header py-3">
             
            <div class="d-sm-flex align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">User Info</h6>
                @can('user-list')
                    <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
                @endcan
                
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-1">
                    <strong>Name </strong>
                </div>
                <div class="col-sm-8">
                    {{ $user->name }}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1">
                    <strong>Email </strong>
                </div>
                <div class="col-sm-8">
                    <a href="mailto:{{$user->email}}">
                        {{ $user->email }}
                    </a>
                </div>
            </div>
            <div class="form-group row ">
                <div class="col-sm-1">
                    <strong>Roles </strong>
                </div>
                <div class="col-sm-8">
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </div>
            </div>
            @can('user-taxpayer-create')
                <div class="form-group row mb-4">
                    <a href="{{route('usertaxpayers.create',$user->id)}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-plus fa-sm text-white-50 "></i> Assign Tax Payer</a>
                </div>
            @endcan
            @can('user-taxpayer-list')
                <div class="form-group row">
                    {{ $dataTable->table() }}
                </div>
            @endcan
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