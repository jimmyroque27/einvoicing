@extends('layouts.master')

@section('content')
<style>
    input.form-control, select.form-control{
        padding: 2px !important;
        /* margin: 2px 2px 2px 2px !important; */
        font-size: .9rem !important;
        height: 30px !important;
        border-radius: 0px;
    }
 
     
</style>

<div class="container-fluid m-0 p-0 rounded-0">

    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Users</h1>
        <a href="{{route('contact.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> --}}

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow m-0 p-0 rounded-0 mb-4">
        <div class="card-header py-3">
            
            <div class="d-sm-flex align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">Edit Contact</h6>
                @can('contact-list')
                    <a href="{{route('contacts.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
                @endcan
            </div>
        </div>
        <div class="card-body  text-dark small">
            
            {!! Form::model($contact, ['method' => 'PATCH','route' => ['contacts.update', $contact->id]]) !!}
            <div class="row">

                <div class="col-sm-3 mb-2">
                    <strong>TIN:</strong>
                    {!! Form::text('Tin', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off', 'maxlength'=>'9')) !!}
                    @error('Tin')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-2">
                    <strong>Branch Code:</strong>
                    {!! Form::text('TIN_BranchCode', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off', 'maxlength'=>'3')) !!}
                    @error('TIN_BranchCode')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-2">
                    <strong>Registration Type:</strong>

                    <?php $indcorp = array("Individual","Corporation"); $type = intVal($contact->private_or_government)-1; ?>
                     
                    {!! Form::select('private_or_government',  $indcorp, $type  , array('placeholder' => '','class' => 'form-control  ' )) !!}
                 
                    {{-- {!! Form::text('private_or_government', null, array('placeholder' => '','class' => 'form-control floatNumber','autocomplete'=>'off')) !!} --}}
                    @error('private_or_government')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mb-2">
                    <strong>Registered Name:</strong>
                    {!! Form::text('registered_name', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                    @error('registered_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mb-2">
                    <strong>Business/Trade Name:</strong>
                    {!! Form::text('trade_name', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                    @error('trade_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mb-2">
                    <strong>Address Line 1:</strong>
                    {!! Form::text('address_line1', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                    @error('address_line1')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mb-2">
                    <strong>Address Line 2 :</strong>
                    {!! Form::text('address_line2', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                    @error('address_line2')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 mb-2">
                    <strong>Barangay:</strong>
                    {!! Form::text('Barangay', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                    @error('Barangay')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-sm-4 mb-2">
                    <strong>District:</strong>
                    {!! Form::text('District', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                    @error('District')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-sm-4 mb-2">
                    <strong>City/Town:</strong>
                    {!! Form::text('City', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                    @error('City')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 mb-2">
                    <strong>Province:</strong>
                    {!! Form::text('Province', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                    @error('Province')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-2">
                    <strong>Zip Code:</strong>
                    {!! Form::text('ZipCode', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                    @error('ZipCode')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <strong>Business Email Address:</strong>
                    {!! Form::text('business_email_address', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                    @error('business_email_address')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-sm-4 mb-2">
                    <strong>Contact Numbers:</strong>
                    {!! Form::text('contact_number', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                    @error('contact_number')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                
            </div>
            <div class="row">

                <hr>
{{--                 
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Currency Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => '','class' => 'form-control')) !!}
                    </div>
                </div>
                   --}}
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

</div>


@endsection