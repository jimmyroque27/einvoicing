@extends('layouts.master')

@section('content')

<div class="container-fluid m-0 p-0  rounded-0 ">
    <style>
        input.form-control, select.form-control{
            padding: 2px !important;
            /* margin: 2px 2px 2px 2px !important; */
            font-size: .9rem !important;
            height: 30px !important;
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
    <div class="card shadow  mx-auto   rounded-0 m-0 p-0 ">
        <div class="card-header  bg-light rounded-0  ">
            <div class="row">
                <div class="col-sm-3 bg-primary p-1 m-0 rounded font-weight-bold text-white"><h6 class="m-1 text-center">Create Contact</h6></div>
                <div class="col-sm-5" ><h6 class="m-2 font-weight-bold text-secondary">Contact's Information</h6></div>
            </div>
        </div>
        <div class="card-body rounded-0  ">
             
            <form method="POST" action="{{route('contacts.store')}}">
            @csrf
            {{-- TIN --}}
            <div class="form-group row  m-0 p-0  ">
                <div class="col-sm-2 m-0 p-0 pr-0">
                    
                    <label for="Tin" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">TIN </span> 
                    </label>
                    <input 
                        type="text" 
                        autocomplete="off"
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
                        autocomplete="off"
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
                <div class="col-sm-1 m-0 mt-2  p-0 ">
                    <button id="getTPData" type="button" class="btn btn-dark btn-user btn-block mt-1   pt-1">
                        Search
                    </button>
                </div>
                <div class="col-sm-4 m-0 mt-3 pl-5 p-0 ">

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
                        type="text" 
                        class="form-control mt-n3 form-control-user rounded-0 @error('registered_name') is-invalid @enderror" 
                        id="registered_name"
                        placeholder="" 
                        name="registered_name" 
                        value="{{ old('registered_name') }}">

                    @error('registered_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                    
            </div>
            {{-- Business/Trade Name --}}
            <div class="form-group row  m-0 p-0 ">
                <div class="col-sm-12 m-0 p-0  ">
                    
                    <label for="trade_name" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Business / Trade Name<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" 
                        class="form-control mt-n3 form-control-user rounded-0 @error('trade_name') is-invalid @enderror" 
                        id="trade_name"
                        placeholder="" 
                        name="trade_name" 
                        value="{{ old('trade_name') }}">

                    @error('trade_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                    
                    
            </div>

             {{-- address_line1 --}}
             <div class="form-group row  m-0 p-0 ">
                <div class="col-sm-12 m-0 p-0">
                    
                    <label for="address_line1" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Address Line 1<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" 
                        class="form-control mt-n3 form-control-user rounded-0 @error('address_line1') is-invalid @enderror" 
                        id="address_line1"
                        placeholder="" 
                        name="address_line1" 
                        value="{{ old('address_line1') }}">

                    @error('address_line1')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            {{-- address_line2 --}}
            <div class="form-group row  m-0 p-0 ">
                <div class="col-sm-12 m-0 p-0">
                    
                    <label for="address_line2" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Address Line 2  </span> 
                    </label>
                    <input 
                        type="text" 
                        class="form-control mt-n3 form-control-user rounded-0 @error('address_line2') is-invalid @enderror" 
                        id="address_line2"
                        placeholder="" 
                        name="address_line2" 
                        value="{{ old('address_line2') }}">

                    @error('address_line2')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            {{-- brgy/district/city --}}
            <div class="form-group row  m-0 p-0 ">
                <div class="col-sm-4 m-0 p-0">
                    
                    <label for="Barangay" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Barangay<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" 
                        class="form-control mt-n3 form-control-user rounded-0 @error('Barangay') is-invalid @enderror" 
                        id="Barangay"
                        placeholder="" 
                        name="Barangay" 
                        value="{{ old('Barangay') }}">

                    @error('Barangay')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-sm-4 m-0 p-0">
                    
                    <label for="District" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">District  </span> 
                    </label>
                    <input 
                        type="text" 
                        class="form-control mt-n3 form-control-user rounded-0 @error('District') is-invalid @enderror" 
                        id="District"
                        placeholder="" 
                        name="District" 
                        value="{{ old('District') }}">

                    @error('District')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-sm-4 m-0 p-0">
                    
                    <label for="City" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Town/City<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" 
                        class="form-control mt-n3 form-control-user rounded-0 @error('City') is-invalid @enderror" 
                        id="City"
                        placeholder="" 
                        name="City" 
                        value="{{ old('City') }}">

                    @error('City')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            {{-- province / zip code --}}
            <div class="form-group row  m-0 p-0 ">
                <div class="col-sm-8 m-0 p-0">
                    
                    <label for="Province" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Province<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" 
                        class="form-control mt-n3 form-control-user rounded-0 @error('Province') is-invalid @enderror" 
                        id="Province"
                        placeholder="" 
                        name="Province" 
                        value="{{ old('Province') }}">

                    @error('Province')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-sm-4 m-0 p-0">
                    
                    <label for="ZipCode" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Zip Code<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" 
                        class="form-control mt-n3 form-control-user rounded-0 @error('ZipCode') is-invalid @enderror" 
                        id="ZipCode"
                        placeholder="" 
                        name="ZipCode" 
                        value="{{ old('ZipCode') }}">

                    @error('ZipCode')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                    
            </div>
            {{-- Business business_email_address / Contacts --}}
            <div class="form-group row  m-0 p-0 mb-3">
                <div class="col-sm-6 m-0 p-0">
                    
                    <label for="business_email_address" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Business E-mail Address<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="email" 
                        autocomplete="off"
                        class="form-control mt-n3 form-control-user rounded-0 @error('business_email_address') is-invalid @enderror" 
                        id="business_email_address"
                        placeholder="" 
                        name="business_email_address" 
                        value="{{ old('business_email_address') }}">

                    @error('business_email_address')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-sm-6 m-0 p-0">
                    
                    <label for="contact_number" class="col-sm-12 pl-1">
                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Contact Number<span style="color:red;">*</span> </span> 
                    </label>
                    <input 
                        type="text" 
                        class="form-control mt-n3 form-control-user rounded-0 @error('contact_number') is-invalid @enderror" 
                        id="contact_number"
                        placeholder="" 
                        name="contact_number" 
                        value="{{ old('contact_number') }}">

                    @error('contact_number')
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
@push('scripts')
    <script>
        $("#getTPData").click(function(){
            // alert("sfsfs")
            var getTP_url = "/contacts/getTaxPayer/"+$("#Tin").val()+"/"+$("#TIN_BranchCode").val();
                // alert(getTP_url)
                $.ajax({url: getTP_url ,                  
                    success: function(data) {
                        if ($.trim(data)){

                            $("#registered_name").val(data[0]['registered_name'])
                            $("#trade_name").val(data[0]['trade_name'])
                            $("#address_line1").val(data[0]['address_line1'])
                            $("#address_line2").val(data[0]['address_line2'])
                            
                            $("#Barangay").val(data[0]['Barangay'])
                            $("#District").val(data[0]['District'])
                            $("#City").val(data[0]['City'])
                            $("#Province").val(data[0]['Province'])
                            $("#ZipCode").val(data[0]['ZIPCode'])
                            $("#business_email_address").val(data[0]['business_email_address'])
                            $("#contact_number").val(data[0]['contact_number'])
                        }else{
                            alert("TIN Not Found!");
                        }
                        
                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert("Send request parameter...");
                        // alert(xhr.responseText +status + error);
                    }
                });
        });
    </script>
@endpush
