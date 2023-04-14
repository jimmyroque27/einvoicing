@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Profile</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> -->

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- Form Registration -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">Buyer Registration</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('buyers.store')}}">
                @csrf
                <input type="hidden" id="SellerId" name="seller_id" value ="{{Auth::user()->seller_id}}"   />

                {{-- Buyer Information --}}
                <div class="form-group row">
                    {{-- Registered Name --}}
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        
                        <label for="first_name" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Registered Name <span style="color:red;">*</span> </span> 
                        </label>
                        <input 
                            type="text" 
                            class="form-control mt-n3 form-control-user @error('RegNm') is-invalid @enderror" 
                            id="RegNm"
                            placeholder="" 
                            name="RegNm" 
                            value="{{ old('RegNm') }}">

                        @error('RegNm')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>    
                {{-- Business/Trade Name --}}
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        
                        <label for="first_name" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Business/Trade Name <span style="color:red;">*</span> </span> 
                        </label>
                            
                        <input 
                            type="text" 
                            class="form-control mt-n3 form-control-user @error('BusinessNm') is-invalid @enderror" 
                            id="BusinessNm"
                            placeholder="" 
                            name="BusinessNm" 
                            value="{{ old('BusinessNm') }}">

                        @error('BusinessNm')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        
                    </div>
                </div> 
                {{-- TIN --}}
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="first_name" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">TIN <span style="color:red;">*</span> </span> 
                        </label>
                            
                        <input 
                            type="text" 
                            class="form-control mt-n3 form-control-user @error('Tin') is-invalid @enderror" 
                            id="Tin"
                            placeholder="" 
                            name="Tin" 
                            value="{{ old('Tin') }}">

                        @error('Tin')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        
                    </div>

                    {{-- Branch Code --}}
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        
                        <label for="first_name" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Branch Code <span style="color:red;">*</span> </span> 
                        </label>
                            
                        <input 
                            type="text" 
                            class="form-control mt-n3 form-control-user @error('BranchCd') is-invalid @enderror" 
                            id="BranchCd"
                            placeholder="" 
                            name="BranchCd" 
                            value="{{ old('BranchCd') }}">

                        @error('BranchCd')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        
                    </div>

                    {{-- Type --}}
                    <!-- <div class="col-sm-4 mb-3 mb-sm-0">
                            
                        <label for="first_name" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Type <span style="color:red;">*</span> </span> 
                        </label>
                            
                        <input 
                            type="text" 
                            class="form-control mt-n3 form-control-user @error('Type') is-invalid @enderror" 
                            id="Type"
                            placeholder="" 
                            name="Type" 
                            value="{{ old('Type') }}">

                        @error('Type')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        
                    </div> -->
                </div>  
                    
   
                {{-- Email --}}  
                <div class="form-group row">                        
                    
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        
                        <label for="first_name" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Email<span style="color:red;">*</span> </span> 
                        </label>
                            
                        <input 
                            type="email" 
                            class="form-control mt-n3 form-control-user @error('Email') is-invalid @enderror" 
                            id="Email"
                            placeholder="" 
                            name="Email" 
                            value="{{ old('Email') }}">

                        @error('Email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        
                    </div>                                     

                </div>
                {{-- Registered Address --}}  
                <div class="form-group row">                        
                    
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        
                        <label for="first_name" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Registered Address<span style="color:red;">*</span> </span> 
                        </label>
                        
                        <input 
                            type="text" 
                            class="form-control mt-n3 form-control-user @error('RegAddr') is-invalid @enderror" 
                            id="RegAddr"
                            placeholder="" 
                            name="RegAddr" 
                            value="{{ old('RegAddr') }}">

                        @error('RegAddr')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>                                     

                </div>
 
                
                {{-- Save Button --}}
                <button type="submit" class="btn btn-success btn-user btn-block">
                    Save
                </button>

            </form>
        </div>
    </div>

</div>


@endsection