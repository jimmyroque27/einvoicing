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
                <h6 class="m-0 font-weight-bold text-primary">Add New User</h6>
                <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
            <div class="form-group row ">
        
                <div class="col-sm-6  ">
                    <strong>First Name:</strong>
                    {!! Form::text('first_name', null, array('placeholder' => '','class' => 'form-control')) !!}
                    @error('first_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-sm-6  ">
                    <strong>Last Name:</strong>
                    {!! Form::text('last_name', null, array('placeholder' => '','class' => 'form-control')) !!}
                    @error('last_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row ">   
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::email('email', null, array('placeholder' => '','class' => 'form-control')) !!}
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password:</strong>
                        {!! Form::password('password', array('placeholder' => '','class' => 'form-control')) !!}
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Confirm Password:</strong>
                        {!! Form::password('password_confirmation', array('placeholder' => '','class' => 'form-control')) !!}
                        @error('password_confirmation')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','single')) !!}
                        @error('roles[]')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

</div>


@endsection