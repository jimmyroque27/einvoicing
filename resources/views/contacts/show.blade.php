@extends('layouts.master')

@section('content')

<div class="container-fluid m-0 p-0 rounded-0 ">
    <style>
        input.form-control, select.form-control{
            padding: 2px !important;
            /* margin: 2px 2px 2px 2px !important; */
            font-size: .9rem !important;
            height: 30px !important;
        }
        input:read-only.form-control , select:read-only.form-control {
            background-color: rgba(247, 247, 247, 0.356) !important;
        }
         
    </style>
     
    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Corporate</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> -->

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- Form Registration -->
    <div class="card shadow  mx-auto  rounded-0 m-0 p-0 ">
        <div class="card-header  bg-light rounded-0  ">
            <div class="row">
                {{-- <div class="col-sm-3 bg-primary p-1 m-0 rounded font-weight-bold text-white"><h6 class="m-1 text-center">Create Contact</h6></div> --}}
                <div class="col-sm-5" ><h6 class="m-2 font-weight-bold text-secondary">Contact's Information</h6></div>
            </div>
        </div>
        <div class="card-body rounded-0  ">
        
            {{-- TIN --}}
            <div class="form-group row  m-0 p-0  ">
                <div class="col-sm-3 m-0 p-0 pr-0">
                    
                    <label for="Tin" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">TIN<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" readonly
                        class="form-control  intNumber mt-n3 form-control-user rounded-0 @error('Tin') is-invalid @enderror" 
                        id="Tin"
                        placeholder="" 
                        maxlength="9"
                        name="Tin" 
                        value="{{ $contact->Tin }}">

                </div>
                <div class="col-sm-3 m-0 p-0 pr-1">
                    
                    <label for="TIN_BranchCode" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Branch Code <span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" readonly
                        class="form-control mt-n3 form-control-user rounded-0 @error('TIN_BranchCode') is-invalid @enderror" 
                        id="TIN_BranchCode"
                        placeholder="" 
                        name="TIN_BranchCode" 
                        value="{{ $contact->TIN_BranchCode }}">
 
                </div>
                
                <div class="col-sm-4 m-0 mt-3 ml-5 p-0 ">

                    <div class="form-check small  ">
                        <input class="form-check-input "  id="private_or_government1" type="radio" value="1"  name="private_or_government" checked>
                        <label class="form-check-label" for="private_or_government1">Private</label>
                    
                        <input class="form-check-input ml-2" id="private_or_government2" type="radio" value="2" name="private_or_government" >
                        <label class="form-check-label pl-4  " for="private_or_government2">Government</label>
                    </div>
                    
                    @error('private_or_government')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            {{-- Registered Name --}}
            <div class="form-group row m-0 p-0 ">
                <div class="col-sm-12 m-0 p-0">
                    
                    <label for="registered_name" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Registered Name<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" readonly
                        class="form-control mt-n3 form-control-user rounded-0 @error('registered_name') is-invalid @enderror" 
                        id="registered_name"
                        placeholder="" 
                        name="registered_name" 
                        value="{{ $contact->registered_name }}">
 
                </div>
                    
            </div>
            {{-- Business/Trade Name --}}
            <div class="form-group row  m-0 p-0 ">
                <div class="col-sm-12 m-0 p-0  ">
                    
                    <label for="trade_name" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Business / Trade Name<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" readonly
                        class="form-control mt-n3 form-control-user rounded-0 @error('trade_name') is-invalid @enderror" 
                        id="trade_name"
                        placeholder="" 
                        name="trade_name" 
                        value="{{ $contact->trade_name }}">
 
                </div>
                    
                    
            </div>

             {{-- address_line1 --}}
             <div class="form-group row  m-0 p-0 ">
                <div class="col-sm-12 m-0 p-0">
                    
                    <label for="address_line1" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Address Line 1<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" readonly
                        class="form-control mt-n3 form-control-user rounded-0 @error('address_line1') is-invalid @enderror" 
                        id="address_line1"
                        placeholder="" 
                        name="address_line1" 
                        value="{{ $contact->address_line1 }}">
 
                </div>
            </div>
            {{-- address_line2 --}}
            <div class="form-group row  m-0 p-0 ">
                <div class="col-sm-12 m-0 p-0">
                    
                    <label for="address_line2" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Address Line 2  </span> 
                    </label>
                    <input 
                        type="text" readonly
                        class="form-control mt-n3 form-control-user rounded-0 @error('address_line2') is-invalid @enderror" 
                        id="address_line2"
                        placeholder="" 
                        name="address_line2" 
                        value="{{ $contact->address_line2 }}">

                     
                </div>
            </div>
            {{-- brgy/district/city --}}
            <div class="form-group row  m-0 p-0 ">
                <div class="col-sm-4 m-0 p-0">
                    
                    <label for="Barangay" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Barangay<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" readonly
                        class="form-control mt-n3 form-control-user rounded-0 @error('Barangay') is-invalid @enderror" 
                        id="Barangay"
                        placeholder="" 
                        name="Barangay" 
                        value="{{ $contact->Barangay }}">

                     
                </div>
                <div class="col-sm-4 m-0 p-0">
                    
                    <label for="District" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">District  </span> 
                    </label>
                    <input 
                        type="text" readonly
                        class="form-control mt-n3 form-control-user rounded-0 @error('District') is-invalid @enderror" 
                        id="District"
                        placeholder="" 
                        name="District" 
                        value="{{ $contact->District }}">

                     
                </div>
                <div class="col-sm-4 m-0 p-0">
                    
                    <label for="City" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Town/City<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" readonly
                        class="form-control mt-n3 form-control-user rounded-0 @error('City') is-invalid @enderror" 
                        id="City"
                        placeholder="" 
                        name="City" 
                        value="{{ $contact->City }}">

                </div>
            </div>
            {{-- province / zip code --}}
            <div class="form-group row  m-0 p-0 ">
                <div class="col-sm-8 m-0 p-0">
                    
                    <label for="Province" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Province<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" readonly
                        class="form-control mt-n3 form-control-user rounded-0 @error('Province') is-invalid @enderror" 
                        id="Province"
                        placeholder="" 
                        name="Province" 
                        value="{{ $contact->Province }}">
 
                </div>
                <div class="col-sm-4 m-0 p-0">
                    
                    <label for="ZipCode" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Zip Code<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" readonly
                        class="form-control mt-n3 form-control-user rounded-0 @error('ZipCode') is-invalid @enderror" 
                        id="ZipCode"
                        placeholder="" 
                        name="ZipCode" 
                        value="{{ $contact->ZipCode }}">
 
                </div>
                    
            </div>
            {{-- Business business_email_address / Contacts --}}
            <div class="form-group row  m-0 p-0 mb-3">
                <div class="col-sm-6 m-0 p-0">
                    
                    <label for="business_email_address" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Business E-mail Address<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="email" readonly
                        class="form-control mt-n3 form-control-user rounded-0 @error('business_email_address') is-invalid @enderror" 
                        id="business_email_address"
                        placeholder="" 
                        name="business_email_address" 
                        value="{{ $contact->business_email_address }}">
 
                </div>
                <div class="col-sm-6 m-0 p-0">
                    
                    <label for="contact_number" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Contact Number<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" readonly
                        class="form-control mt-n3 form-control-user rounded-0 @error('contact_number') is-invalid @enderror" 
                        id="contact_number"
                        placeholder="" 
                        name="contact_number" 
                        value="{{ $contact->contact_number }}">

               
                </div>
                    
            </div>

            
          
        </div>
    </div>

</div>


@endsection
 