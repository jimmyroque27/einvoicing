@extends('layouts.master')

@section('content')
<style>
    input, select, option{
        border-radius: 0px !important;
    }
</style>

<div class="container-fluid m-0 p-0 rounded-0">

    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Users</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> --}}

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow m-0 p-0 rounded-0 mb-4">
        <div class="card-header py-3">
            
            <div class="d-sm-flex align-items-center justify-content-between  ">
                <h6 class="m-0 font-weight-bold text-primary">Add Currency</h6>
                <a href="{{route('currency.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
            </div>
        </div>
        <div class="card-body h6 small">
            {!! Form::open(array('route' => 'currency.store','method'=>'POST')) !!}
            <div class="form-group row ">
        
                <div class="col-sm-8 mb-4 ">
                    <strong>Currency:</strong>
                    {!! Form::text('name', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-4 ">
                    <strong>Code:</strong>
                    {!! Form::text('code', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off', 'maxlength'=>'5')) !!}
                    @error('code')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-4 ">
                    <strong>Rate:</strong>
                    {!! Form::text('rate', null, array('placeholder' => '','class' => 'form-control floatNumber','autocomplete'=>'off')) !!}
                    @error('rate')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <hr>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

</div>


@endsection