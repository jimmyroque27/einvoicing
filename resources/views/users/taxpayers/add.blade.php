@extends('layouts.master')

@section('content')

<div class="container-fluid p-4">

    {{-- <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Users</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> --}}

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card col-sm-9 p-0 mx-auto shadow rounded-0 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New User - Tax Payer Assignment</h6>
        </div>
        <div class="card-body mb-4">
            <form method="POST" action="{{route('usertaxpayers.assign')}}">
                @csrf
            

                    {{-- TIN/Branch/Birth Date --}}
                    <div class="form-group row  m-0 p-0 mb-4">
                        <div class="col-sm-2  mt-4">
                            Tax Payer:
                        </div>
                        <div class="col-sm-4 m-0 p-0 pr-1">
                            
                            <label for="Tin" class="col-sm-12 pl-1">
                                <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">TIN <span style="color:red;">*</span> </span> 
                            </label>
                            <input 
                                type="text" 
                                class="form-control intNumber mt-n3 form-control-user rounded-0 @error('Tin') is-invalid @enderror" 
                                id="Tin"
                                placeholder="" 
                                maxlength="9"
                                name="Tin" 
                                value="{{ old('Tin') }}">
    
                            @error('Tin')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-2 m-0 p-0 pr-1">
                            
                            <label for="TIN_BranchCode" class="col-sm-12 pl-1">
                                <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Branch Code  </span> 
                            </label>
                            <input 
                                type="text" 
                                class="form-control mt-n3 form-control-user rounded-0 @error('TIN_BranchCode') is-invalid @enderror" 
                                id="TIN_BranchCode"
                                placeholder="" 
                                maxlength="3"
                                name="TIN_BranchCode" 
                                value="{{ old('TIN_BranchCode') }}">
    
                            @error('TIN_BranchCode')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4 m-0 p-0 pr-1">
                            
                            <label for="tp_id" class="col-sm-12 pl-1">
                                <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Tax Payer's ID <span style="color:red;">*</span> </span> 
                            </label>
                            <input 
                                type="text" 
                                class="form-control intNumber mt-n3 form-control-user rounded-0 @error('tp_id') is-invalid @enderror" 
                                id="tp_id"
                                placeholder="" 
                                maxlength="20"
                                name="tp_id" 
                                value="{{ old('tp_id') }}">
    
                            @error('tp_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                         
                    </div>
 

                {{-- Save Button --}}
                <button type="submit" class="btn btn-primary btn-user btn-block col-sm-2 mx-auto">
                    Assign
                </button>

            </form>
        </div>
    </div>

</div>


@endsection