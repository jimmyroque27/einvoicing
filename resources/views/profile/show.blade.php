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
            <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
        </div>
        <div class="card-body">
             
                @csrf
                @if(Auth::user()->id == $profile->user_id)

                
                    <div class="form-group row">
                    
                        {{-- First Name --}}
                        <div class="col-sm-4 mb-3 mb-sm-0">
                           
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">First Name <span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $profile->first_name }} </span>
                            
                        </div>
                        {{-- Middle Name --}}
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Middle Name <span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $profile->middle_name }} </span>
                            
                        </div>
                        {{-- Last Name --}}
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Last Name <span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $profile->last_name }} </span>
                            
                        </div>                                     

                    </div>

                    <div class="form-group row">
                        {{-- Address 1 --}}
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Address <span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $profile->address1 }} </span>
                            
                        </div>
                        {{-- Address 2 --}}
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Brgy. / Street No. <span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $profile->address2 }} </span>
                            
                        </div>
                        {{-- City / Town --}}
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">City / Town <span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $profile->city }} </span>
                            
                        </div>                                     

                    </div>

                    <div class="form-group row">
                        {{-- Province --}}
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Province <span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $profile->province }} </span>
                            
                        </div>
                        {{-- Country --}}
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Country <span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $profile->country }} </span>
                            
                        </div>
                        {{-- Zip Code --}}
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Zip Code <span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $profile->zipcode }} </span>
                            
                        </div>                                     

                    </div>
                    <div class="form-group row">
                        {{-- Contact Number --}}
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Mobile No. <span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $profile->contactno }} </span>
                            
                        </div>
                        {{-- Birth Date --}}
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            
                            <label for="first_name" class="col-sm-12">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Birth Date <span style="color:red;">*</span> </span> 
                            </label>
                            <span class="form-control mt-n3" > {{  $profile->birthdate }} </span>
                            
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