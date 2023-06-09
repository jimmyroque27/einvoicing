@extends('layouts.master')

@section('content')

<div class="container-fluid m-0 p-0 rounded-0">

    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Users</h1>
        <a href="{{route('atc.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> --}}

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow m-0 p-0 rounded-0 mb-4">
        <div class="card-header py-3">
            
            <div class="d-sm-flex align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">Edit ATC</h6>
                @can('atc-list')
                    <a href="{{route('atc.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            
            {!! Form::model($atc, ['method' => 'PATCH','route' => ['atc.update', $atc->id]]) !!}
            {{-- ATC --}}
            <div class="form-group row ">
                <div class="col-sm-2 pt-1">
                    <strong>ATC Code:</strong>
                </div>
                <div class="col-sm-2">
                    {!! Form::text('atc_code', old('atc_code'), array('placeholder' => '','class' => 'form-control col-sm-12','autocomplete'=>'off')) !!}
                    @error('atc_code')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            {{-- Description --}}
            <div class="form-group row ">
                <div class="col-sm-2 pt-1 ">
                    <strong>Description:</strong>
                </div>
                <div class="col-sm-10  ">
                    {!! Form::textarea('description', old('description'), array('placeholder' => '','class' => 'form-control rounded-0 small','autocomplete'=>'off','rows'=>"2")) !!}
                    @error('description')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row ">
                <div class="col-sm-2 pt-1 ">
                    <strong>Coverage:</strong>
                </div>
                <div class="col-sm-10 ">
                    
                    {!! Form::textarea('coverage', old('coverage'), array('placeholder' => '','class' => 'form-control rounded-0 small','autocomplete'=>'off','rows'=>"2")) !!}
                    @error('coverage')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row ">
                <div class="col-sm-2 pt-1  ">
                    <strong>Type:</strong>
                </div>
                <div class="col-sm-10 ">
                    <?php $indcorp = array("Individual","Corporation")   ?>
                     
                    {!! Form::select('type',  $indcorp, ($atc->type=="Corporation"?1:0), array('placeholder' => '','class' => 'form-control col-sm-2' )) !!}
                   
                    @error('type')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row  mb-4">
                <div class="col-sm-2 pt-1 ">
                    <strong>EWT Rate %:</strong>
                </div>
                <div class="col-sm-1 ">
                    
                    {!! Form::text('ewt_rate',null, array('placeholder' => '','class' => 'form-control floatNumber rounded-0','autocomplete'=>'off','rows'=>"2")) !!}
                    @error('ewt_rate')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <hr>
            <div class="row">
                 
                  
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

</div>


@endsection