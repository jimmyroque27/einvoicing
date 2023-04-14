@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> -->

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Buyer Information</h6>
        </div>
        <div class="card-body">
             
                @csrf
                
                @if(Auth::user()->seller_id != $buyer->seller_id)
                    {{-- Buyer Information --}}
                    <div class="form-group row">
                    
                        

                        {{-- Registered Name --}}
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Registered Name <span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $buyer->RegNm }} </span>
                            
                        </div>
                    </div>    
                    {{-- Business/Trade Name --}}
                    <div class="form-group row">
                       
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Business/Trade Name <span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $buyer->BusinessNm }} </span>
                            
                        </div>
                    </div> 
                    {{-- TIN --}}
                    <div class="form-group row">
                       
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">TIN <span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $buyer->Tin }} </span>
                            
                        </div>
                        {{-- Branch Code --}}
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Branch Code <span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $buyer->BranchCd }} </span>
                            
                        </div>
                        {{-- Type --}}
                        <div class="col-sm-4 mb-3 mb-sm-0">
                                
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Type <span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $buyer->Type }} </span>
                            
                        </div>

                    </div>  
                    
                 
                    
                      
                    {{-- Email --}}  
                    <div class="form-group row">                        
                        
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Email<span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $buyer->Email }} </span>
                            
                        </div>                                     

                    </div>
                    {{-- Registered Address --}}  
                    <div class="form-group row">                        
                        
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Registered Address<span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $buyer->RegAddr }} </span>
                            
                        </div>                                     

                    </div>
                    
 
                @else
        

                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <!-- <button type="button" class="close" data-dismiss="alert">
                            <i class="fa fa-times"></i>
                        </button> -->
                        <strong>Error !</strong> Unauthorized User ID
                    </div>

                @endif
        </div>
    </div>

</div>


@endsection