@extends('layouts.master')

@section('content')
<div class="container-fluid m-0 p-0 ">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between   float-top">
        {{-- <span class="h4 ml-3 p-1 text-dark">DASHBOARD</span> --}}
        @can('invoice-create','taxpayer-create','contact-create','product-create','user-create')
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - + Button-->
                <li class="nav-item dropdown no-arrow ">
                    <a class="nav-link  dropdown-toggle shadow-none btn btn-primary rounded-0 p-2" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class=" h3 text-white ">
                            <i class="fas fa-fw fa-plus"></i>
                        </span>
                        
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu bg-light mr-3 text-white shadow  rounded-0" aria-labelledby="userDropdown">
                        @can('invoice-create')
                            <a class="dropdown-item" href="{{route('invoices.create')}}">
                                <i class="fas fa-cart-plus fa-sm fa-fw mr-2 text-warning"></i>
                                Add E-Invoice
                            </a>
                        @endcan
                        @can('taxpayer-create')
                            <a class="dropdown-item" href="{{route('taxpayers.create')}}">
                                <i class="fas fa-store fa-sm fa-fw mr-2 text-warning"></i>
                                Add Tax Payer
                            </a>
                        @endcan
                        @can('contact-create')
                            <a class="dropdown-item" href="{{route('contacts.create')}}">
                                <i class="fas fa-address-book fa-sm fa-fw mr-2 text-warning"></i>
                                Add Contacts
                            </a>
                        @endcan
                        @can('product-create')
                            <a class="dropdown-item" href="{{route('products.create')}}">
                                <i class="fas fa-barcode fa-sm fa-fw mr-2 text-warning"></i>
                                Add Product
                            </a>
                        @endcan
                        @can('user-create')
                            <a class="dropdown-item" href="{{route('products.create')}}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-primary"></i>
                                Add User
                            </a>
                        @endcan
                        
                        
                        
                    </div>
                </li>
            </ul>
        @endcan
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
    <!-- Content Row -->
    <div class="row p-2 m-0">

        <!-- User - Tax Payer Assignment -->
        @can('user-taxpayer-list','user-taxpayer-create')
        <div class="col-xl-3 mb-4 ">
            <div class="card border-left-primary shadow h-100 ">
                <div class="card-body">
                   
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 ">
                                Tax Payer Assignment
                            </div>
                            <div class="h6 mt-2 ">
                                @if($UserTaxPayers==0)
                                    @can('user-taxpayer-create')
                                        <a class="nav-link font-weight-bold  p-0 m-0 small text-danger" 
                                            href="{{route('usertaxpayers.create',Auth::user()->id)}}">
                                            Assign your Tax Payer's Identification Number
                                        </a>
                                    @endcan
                                @else
                                    @can('user-taxpayer-list')
                                        <a class="nav-link font-weight-bold  p-0 m-0 small text-secondary"
                                        href="{{route('usertaxpayers.index')}}">
                                            {{$UserTaxPayers}} Assigned Tax Payer
                                        </a>
                                    @endcan
                                @endif

                                

                            </div>
                        </div>
                        <div class="col-auto ">
                            <i class="fas fa-universal-access fa-2x text-gray-300"></i>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        @endcan
{{-- 
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Earnings (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Php 40,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings (YTD)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Php 215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Direct Sponsors Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Direct Sponsors
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

</div>
@endsection
