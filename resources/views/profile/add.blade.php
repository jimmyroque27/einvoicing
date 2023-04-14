@extends('layouts.master')

@section('content')

<div class="container-fluid m-0 p-0 rounded-0 ">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Profile</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> -->

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- Form Registration -->
    <div class="card shadow m-0 p-0 rounded-0 mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profile Registration</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('profile.store')}}">
                @csrf
           
                <div class="form-group row">
                    <input type="hidden" id="UserId" name="user_id" value ="{{Auth::user()->id}}"   />
                    {{-- First Name --}}
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <!-- <span class style="color:red;">*</span>First Name</label> -->
                        <label for="first_name" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">First Name <span style="color:red;">*</span> </span> 
                        </label>
                        
                        <input 
                            type="text" 
                            class="form-control mt-n3 form-control-user @error('first_name') is-invalid @enderror" 
                            id="FirstName"
                            placeholder="" 
                            name="first_name" 
                            value="{{ old('first_name') }}">

                        @error('first_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Middle Name --}}
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <!-- <span style="color:red;">*</span>Middle Name</label> -->
                        <label for="middle_name" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Middle Name <span style="color:red;">*</span> </span> 
                        </label>
                        <input 
                            type="text" 
                            class="form-control mt-n3 form-control-user @error('middle_name') is-invalid @enderror" 
                            id="MiddleName"
                            placeholder="" 
                            name="middle_name" 
                            value="{{ old('middle_name') }}">

                        @error('middle_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    {{-- Last Name --}}
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <!-- <span style="color:red;">*</span>Last Name</label> -->
                        <label for="last_name" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Last Name <span style="color:red;">*</span> </span> 
                        </label>
                        <input 
                            type="text" 
                            class="form-control mt-n3 form-control-user @error('last_name') is-invalid @enderror" 
                            id="LastName"
                            placeholder="" 
                            name="last_name" 
                            value="{{ old('last_name') }}">

                        @error('last_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                     
                </div>

                <div class="form-group row">

                    {{-- Address --}}
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <!-- <span style="color:red;">*</span>Address</label> -->
                        <label for="address1" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Address <span style="color:red;">*</span> </span> 
                        </label>
                        <input 
                            type="text" 
                            class="form-control mt-n3 form-control-user @error('address1') is-invalid @enderror" 
                            id="Address1"
                            placeholder="" 
                            name="address1" 
                            value="{{ old('address1') }}">

                        @error('address1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Address 2--}}
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <!-- <span style="color:red;">*</span>Address</label> -->
                        <label for="address2" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Brgy. / Street No. <span style="color:red;">*</span> </span> 
                        </label>
                        <input 
                            type="text" 
                            class="form-control mt-n3 form-control-user @error('address2') is-invalid @enderror" 
                            id="Address2"
                            placeholder="" 
                            name="address2" 
                            value="{{ old('address2') }}">

                        @error('address2')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- City/Town --}}
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <!-- <span style="color:red;">*</span>City / Town</label> -->
                        <label for="city" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">City / Town <span style="color:red;">*</span> </span> 
                        </label>
                        <input 
                            type="text" 
                            class="form-control mt-n3 form-control-user @error('city') is-invalid @enderror" 
                            id="City"
                            placeholder="" 
                            name="city" 
                            value="{{ old('city') }}">

                        @error('city')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                     
                </div>

                <div class="form-group row">

                    {{-- Province --}}
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <!-- <span style="color:red;">*</span>Province / State</label> -->
                        <label for="province" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Province / State <span style="color:red;">*</span> </span> 
                        </label>
                        <input 
                            type="text" 
                            class="form-control mt-n3 form-control-user @error('province') is-invalid @enderror" 
                            id="province"
                            placeholder="" 
                            name="province" 
                            value="{{ old('province') }}">

                        @error('province')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Country --}}
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <!-- <span style="color:red;">*</span>Country</label> -->
                        <label for="country" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Country <span style="color:red;">*</span> </span> 
                        </label>
                        <input 
                            type="text" 
                            class="form-control mt-n3 form-control-user @error('country') is-invalid @enderror" 
                            id="Country"
                            placeholder="" 
                            name="country" 
                            value="{{ old('country') }}">

                        @error('country')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Zip Code --}}
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <!-- <span style="color:red;">*</span>Zip Code</label> -->
                        <label for="zipcode" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Zip Code <span style="color:red;">*</span> </span> 
                        </label>
                        <input 
                            type="text" 
                            class="form-control mt-n3 form-control-user @error('zipcode') is-invalid @enderror" 
                            id="ZipCode"
                            placeholder="" 
                            name="zipcode" 
                            value="{{ old('zipcode') }}">

                        @error('zipcode')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                     
                </div>


                <div class="form-group row">

                    {{-- Mobile Number --}}
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <!-- <span style="color:red;">*</span>Province / State</label> -->
                        <label for="contactno" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Mobile No. <span style="color:red;">*</span> </span> 
                        </label>
                        <input 
                            type="text" 
                            class="form-control mt-n3 form-control-user @error('contactno') is-invalid @enderror" 
                            id="Contactno"
                            placeholder="" 
                            name="contactno" 
                            value="{{ old('contactno') }}">

                        @error('contactno')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
 
                    {{-- Birth Date --}}
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <!-- <span style="color:red;">*</span>Province / State</label> -->
                        <label for="contactno" class="col-sm-12">
                            <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Birth Date <span style="color:red;">*</span> </span> 
                        </label>
                        <input 
                            type="date" 
                            class="form-control mt-n3 form-control-user @error('birhtdate') is-invalid @enderror" 
                            id="BirthDate"
                            placeholder="" 
                            name="birthdate" 
                            value="{{ old('birhtdate') }}">

                        @error('birthdate')
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