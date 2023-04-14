@extends('layouts.master')

@section('content')

<div class="container-fluid  m-0 p-0 rounded-0 ">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Profile</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> -->

    {{-- Alert Messages --}}
    @include('common.alert')
    <style>
        input.form-control, select.form-control{
            padding: 2px !important;
            /* margin: 2px 2px 2px 2px !important; */
            font-size: .9rem !important;
            height: 30px !important;
        }
         
    </style>
    <!-- Form Registration -->
    <div class="card shadow  m-0 p-0 rounded-0 mb-4  mx-auto">
        <div class="card-header py-3 rounded-0 bg-light  m-0 ">
            <h6 class="m-0  font-weight-bold   text-secondary">Product Information </h6>
        </div>
        <div class="card-body  text-dark">
            <div class="form-group row">
                <div class="col-sm-2 mb-3 mb-sm-0 text-primary">
                    Item Code:
                </div>
                <div class="col-sm-4 mb-3 mb-sm-0 border">
                    {{$item->ItemCode}}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 mb-3 mb-sm-0 text-primary">
                    Item Name:
                </div>
                <div class="col-sm-10 mb-3 mb-sm-0 border">
                    {{$item->item_name}}
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-sm-2 mb-3 mb-sm-0 text-primary">
                    Description:
                </div>
                <div class="col-sm-10 mb-3 mb-sm-0 border">
                    {{$item->Description}}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 mb-3 mb-sm-0 text-primary">
                    Unit :
                </div>
                <div class="col-sm-2 mb-3 mb-sm-0 border">
                    {{$item->UnitofMeasure}}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 mb-3 mb-sm-0 text-primary">
                    Unit Price:
                </div>
                <div class="col-sm-2 mb-3 mb-sm-0 border text-right">
                    {{number_format($item->UnitSalesPrice,2)}}
                </div>
                <div class="col-sm-2 mb-3 mb-sm-0">
                     
                </div>
                <div class="col-sm-2 mb-3 mb-sm-0 text-primary">
                    VAT Type :
                </div>
                <div class="col-sm-4 mb-3 mb-sm-0 border">
                    {{$item->VAT_Type}}
                    @if($item->VAT_Type=="A3")
                        - VAT Exempt
                    @else
                        @if($item->VAT_Type=="A2")
                            - Zero Rated VAT (0%)
                        @else
                            - Value Added Tax (12%)
                        @endif
                    @endif
                    
                </div>
            </div>
        
 
        </div>
    </div>

</div>


@endsection