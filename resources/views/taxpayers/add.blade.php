@extends('layouts.master')

@section('content')

<div class="container-fluid m-0 p-0">
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
    <div class="card shadow mb-4  rounded-0">
        <div class="card-header  bg-light rounded-0  ">
            <div class="row">
                <div class="col-sm-3 bg-primary p-1 m-0 rounded font-weight-bold text-white"><h6 class="m-1 text-center">Adding Organization</h6></div>
                <div class="col-sm-5" ><h6 class="m-2 font-weight-bold text-secondary">Tax Payer's Information</h6></div>
            </div>
        </div>
        <div class="card-body rounded-0 p-0 pt-3 ">
             
            <ul class="nav nav-tabs pl-3" id="myTab" role="tablist">
            
                <li class="nav-item">
                <a class="nav-link active" id="Individual-tab" data-toggle="tab" href="#Individual" role="tab" aria-controls="Individual" aria-selected="true">Individual</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="Corporate-tab" data-toggle="tab" href="#Corporate" role="tab" aria-controls="Corporate" aria-selected="false">Corporate</a>
                </li>
                
            </ul>
            
            <div class="tab-content p-3" id="myTabContent">
                {{-- Individual Tax Payer --}}
                <div class="tab-pane fade active" id="Individual" role="tabpanel" aria-labelledby="Individual-tab">
                    <form method="POST" action="{{route('taxpayers.store')}}">
                        @csrf
                        <input type="hidden" name="tp_classification" value="1"/>
                        <div class="form-group row">
                            {{-- Business Details --}}
                            <div class="col-sm-6 m-0 p-2">
                                {{-- Complete Name --}}
                                <div class="form-group row  m-0 p-0">
                                    <div class="col-sm-4 m-0 p-0">
                                        
                                        <label for="first_name" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">First Name <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('first_name') is-invalid @enderror" 
                                            id="first_name"
                                            placeholder="" 
                                            name="first_name" 
                                            value="{{ old('first_name') }}">
                
                                        @error('first_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4  m-0 p-0">
                                        
                                        <label for="middle_name" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Middle Name <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('middle_name') is-invalid @enderror" 
                                            id="middle_name"
                                            placeholder="" 
                                            name="middle_name" 
                                            value="{{ old('middle_name') }}">
                
                                        @error('middle_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4  m-0 p-0">
                                        
                                        <label for="last_name" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Last Name <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('last_name') is-invalid @enderror" 
                                            id="last_name"
                                            placeholder="" 
                                            name="last_name" 
                                            value="{{ old('last_name') }}">
                
                                        @error('last_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- TIN/Branch/Birth Date --}}
                                <div class="form-group row  m-0 p-0">
                                    <div class="col-sm-4 m-0 p-0 pr-1">
                                        
                                        <label for="Tin" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">TIN <span style="color:red;">*</span> </span> 
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
                                    <div class="col-sm-4 m-0 p-0 pr-1">
                                        
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
                                    <div class="col-sm-4  m-0 p-0  ">
                                        
                                        <label for="BirthDate" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Date of Birth <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="date" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('BirthDate') is-invalid @enderror" 
                                            id="BirthDate"
                                            placeholder="" 
                                            name="BirthDate" 
                                            value="{{ date('Y-m-d') }}">
                
                                        @error('BirthDate')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                {{-- COR --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-8 m-0 p-0  pr-1">
                                        
                                        <label for="cor_ocn" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">COR OCN <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('cor_ocn') is-invalid @enderror" 
                                            id="cor_ocn"
                                            placeholder="" 
                                            name="cor_ocn" 
                                            value="{{ old('cor_ocn') }}">
                
                                        @error('cor_ocn')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4  m-0 p-0 ">
                                        
                                        <label for="cor_issued_date" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted   pt-1 pl-1 pr-1">COR Issued Date <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="date" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('cor_issued_date') is-invalid @enderror" 
                                            id="cor_issued_date"
                                            placeholder="" 
                                            name="cor_issued_date" 
                                            value="{{ old('cor_issued_date') }}"
                                             >
                
                                        @error('cor_issued_date')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                {{-- DTI --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-8 m-0 p-0  pr-1">
                                        
                                        <label for="SEC_Registration_No" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">License / DTI Registration No.  <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('SEC_Registration_No') is-invalid @enderror" 
                                            id="SEC_Registration_No"
                                            placeholder="" 
                                            name="SEC_Registration_No" 
                                            value="{{ old('SEC_Registration_No') }}">
                
                                        @error('SEC_Registration_No')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4  m-0 p-0 ">
                                        
                                        <label for="SEC_Registration_date" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted   pt-1 pl-1 pr-1">DTI Registration Date <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="date" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('SEC_Registration_date') is-invalid @enderror" 
                                            id="SEC_Registration_date"
                                            placeholder="" 
                                            name="SEC_Registration_date" 
                                            value="{{ old('SEC_Registration_date') }}"
                                             >
                
                                        @error('SEC_Registration_date')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                {{-- Industries/Registered Activities --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-8 m-0 p-0  pr-1">
                                        
                                        <label for="industry" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Line of Business / Industries <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('industry') is-invalid @enderror" 
                                            id="industry"
                                            placeholder="" 
                                            name="industry" 
                                            value="{{ old('industry') }}">
                
                                        @error('industry')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4  m-0 p-0 ">
                                        
                                        <label for="registered_activities" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted   pt-1 pl-1 pr-1">Registered Activities <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('registered_activities') is-invalid @enderror" 
                                            id="registered_activities"
                                            placeholder="" 
                                            name="registered_activities" 
                                            value="{{ old('registered_activities') }}">
                
                                        @error('registered_activities')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                {{-- Business/Trade Name --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-12 m-0 p-0  pr-1">
                                        
                                        <label for="trade_name" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Business / Trade Name <span style="color:red;">*</span> </span> 
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
                                {{--  PTU Number/Acknowledgment Certificate Control Number	--}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-12 m-0 p-0  pr-1">
                                        
                                        <label for="PtuNum" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Registered PTU Number <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('PtuNum') is-invalid @enderror" 
                                            id="PtuNum"
                                            placeholder="" 
                                            name="PtuNum" 
                                            value="{{ old('PtuNum') }}">
                
                                        @error('PtuNum')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                     
                                </div>
                                 {{-- Registered as Branch --}}
                                 <div class="form-group row  m-0 p-0  ">
                                    <div class="col-sm-12 m-0 p-0">
                                        
                                        <div class="form-check small m-0 p-0 pt-2">
                                            
                                            <label class="form-check-label" for="registration_type">
                                                Registered as Branch?
                                            </label>
                                            <input class="form-check-input ml-3 " type="checkbox" value="Y" id="registration_type"  name ="registration_type">
                                              
                                        </div>
                                        @error('registration_type')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                     
                                </div>
                            </div>

                            {{-- Address / Contact Details --}}
                            <div class="col-sm-6 m-0 p-2">
                                {{-- address_line1 --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-12 m-0 p-0">
                                        
                                        <label for="address_line1" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Address Line 1 <span style="color:red;">*</span> </span> 
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
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Barangay <span style="color:red;">*</span> </span> 
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
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Town/City <span style="color:red;">*</span> </span> 
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
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Province <span style="color:red;">*</span> </span> 
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
                                        
                                        <label for="ZIPCode" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Zip Code <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('ZIPCode') is-invalid @enderror" 
                                            id="ZIPCode"
                                            placeholder="" 
                                            name="ZIPCode" 
                                            value="{{ old('ZIPCode') }}">
                
                                        @error('ZIPCode')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                {{-- Business business_email_address / Contacts --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-6 m-0 p-0">
                                        
                                        <label for="business_email_address" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Business E-mail Address <span style="color:red;">*</span> </span> 
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
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Contact Number <span style="color:red;">*</span> </span> 
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
                                {{-- RDO --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-4 m-0 p-0">
                                        
                                        <label for="RDO" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">RDO <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('RDO') is-invalid @enderror" 
                                            id="RDO"
                                            placeholder="" 
                                            name="RDO" 
                                            value="{{ old('RDO') }}">
                
                                        @error('RDO')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 m-0 p-0 ">

                                        <div class="form-check small ml-2 mt-4">
                                            <input class="form-check-input " id="CalFiscal1" value = "C" type="radio"  name="CalFiscal" checked>
                                            <label class="form-check-label" for="CalFiscal1">Calendar</label>
                                         
                                            <input class="form-check-input ml-2" id="CalFiscal2" value="F" type="radio" name="CalFiscal" >
                                            <label class="form-check-label pl-4  " for="CalFiscal2">Fiscal</label>
                                        </div>
                                         
                                        @error('CalFiscal')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3 m-0 p-0 mt-3 text-right">
                                        <label for="FiscalEnd" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-2 pl-1 pr-1">Fiscal End</span> </span> 
                                        </label>
                                    </div>
                                    <div class="col-sm-1 m-0 p-0  mt-3 ">
                                        <select class="form-control h6  m-0   p-1   rounded-0"  name="FiscalEnd">
                                            <option value="01" selected>01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select> 
                                         
                                        @error('FiscalEnd')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                {{-- VAT Type --}}
                                <div class="form-group row  m-0 p-0 pt-2 ">
                                    <div class="col-sm-2 m-0 p-0   pt-1 ">
                                        <label for="vat_registered" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-2 pl-1 pr-1">VAT Type</span> </span> 
                                        </label>
                                    </div>
                                    <div class="col-sm-4 m-0 p-0 ">
    
                                        
                                        <select class="form-control h6  m-0   p-1   rounded-0"  name="vat_registered">
                                            <option value="0" selected>VAT Registered</option>
                                            <option value="1">Non-VAT Registered</option>
                                            
                                        </select> 
                                        
                                        @error('vat_registered')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                               
                            </div>
                            
                        </div>  
        
                        
                        {{-- Save Button --}}
                        <button type="submit" class="btn btn-success btn-user btn-block">
                            Save
                        </button>
        
                    </form>  
                </div>


                {{-- Corporate --}}
                <div class="tab-pane fade" id="Corporate" role="tabpanel" aria-labelledby="Corporate-tab">
                    
                    <form  method="POST" action="{{route('taxpayers.store')}}">
                        @csrf
                        <input type="hidden" name ="tp_classification" value="2"/>
                        <div class="form-group row  m-0 p-0">
                            <div class="col-sm-12 m-0 p-0 ">

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
                        <div class="form-group row">
                            {{-- Business Details --}}
                            <div class="col-sm-6 m-0 p-2">
                                {{-- Registered Name --}}
                                <div class="form-group row  m-0 p-0">
                                    <div class="col-sm-12 m-0 p-0">
                                        
                                        <label for="registered_name" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Registered Name <span style="color:red;">*</span> </span> 
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
                                {{-- TIN/Branch/Birth Date --}}
                                <div class="form-group row  m-0 p-0">
                                    <div class="col-sm-6 m-0 p-0 pr-1">
                                        
                                        <label for="Tin2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">TIN <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            autocomplete="off"
                                            class="form-control intNumber mt-n3 form-control-user rounded-0 @error('Tin2') is-invalid @enderror" 
                                            id="Tin2"
                                            placeholder="" 
                                            maxlength="9"
                                            name="Tin2" 
                                            value="{{ old('Tin2') }}">
                
                                        @error('Tin2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 m-0 p-0 pr-1">
                                        
                                        <label for="TIN_BranchCode2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Branch Code  </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            autocomplete="off"
                                            class="form-control mt-n3 form-control-user rounded-0 @error('TIN_BranchCode2') is-invalid @enderror" 
                                            id="TIN_BranchCode2"
                                            maxlength="3"
                                            placeholder="" 
                                            name="TIN_BranchCode2" 
                                            value="{{ old('TIN_BranchCode2') }}">
                
                                        @error('TIN_BranchCode2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    
                                     
                                </div>
                                {{-- SEC --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-8 m-0 p-0  pr-1">
                                        
                                        <label for="SEC_Registration_No2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">SEC Registration No.  <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('SEC_Registration_No2') is-invalid @enderror" 
                                            id="SEC_Registration_No2"
                                            placeholder="" 
                                            name="SEC_Registration_No2" 
                                            value="{{ old('SEC_Registration_No2') }}">
                
                                        @error('SEC_Registration_No2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4  m-0 p-0 ">
                                        
                                        <label for="SEC_Registration_date2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted   pt-1 pl-1 pr-1">SEC Registration Date <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="date" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('SEC_Registration_date2') is-invalid @enderror" 
                                            id="SEC_Registration_date2"
                                            placeholder="" 
                                            name="SEC_Registration_date2" 
                                            value="{{ old('SEC_Registration_date2') }}"
                                             >
                
                                        @error('SEC_Registration_date2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                {{-- COR --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-8 m-0 p-0  pr-1">
                                        
                                        <label for="CorOcn2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">COR OCN <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('CorOcn2') is-invalid @enderror" 
                                            id="CorOcn2"
                                            placeholder="" 
                                            name="CorOcn2" 
                                            value="{{ old('CorOcn2') }}">
                
                                        @error('CorOcn2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4  m-0 p-0 ">
                                        
                                        <label for="CorDate2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted   pt-1 pl-1 pr-1">COR Issued Date <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="date" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('CorDate2') is-invalid @enderror" 
                                            id="CorDate2"
                                            placeholder="" 
                                            name="CorDate2" 
                                            value="{{ old('CorDate2') }}"
                                             >
                
                                        @error('CorDate2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                
                                {{-- Industries/Registered Activities --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-8 m-0 p-0  pr-1">
                                        
                                        <label for="Industry2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Line of Business / Industries <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('Industry2') is-invalid @enderror" 
                                            id="Industry2"
                                            placeholder="" 
                                            name="Industry2" 
                                            value="{{ old('Industry2') }}">
                
                                        @error('Industry2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4  m-0 p-0 ">
                                        
                                        <label for="RegActivities2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted   pt-1 pl-1 pr-1">Registered Activities <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('RegActivities2') is-invalid @enderror" 
                                            id="RegActivities2"
                                            placeholder="" 
                                            name="RegActivities2" 
                                            value="{{ old('RegActivities2') }}">
                
                                        @error('RegActivities2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                {{-- Business/Trade Name --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-12 m-0 p-0  pr-1">
                                        
                                        <label for="trade_name2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Business / Trade Name <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('trade_name2') is-invalid @enderror" 
                                            id="trade_name2"
                                            placeholder="" 
                                            name="trade_name2" 
                                            value="{{ old('trade_name2') }}">
                
                                        @error('trade_name2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                     
                                </div>
                                {{--  PTU Number/Acknowledgment Certificate Control Number	--}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-12 m-0 p-0  pr-1">
                                        
                                        <label for="PtuNum2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Registered PTU Number <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('PtuNum2') is-invalid @enderror" 
                                            id="PtuNum2"
                                            placeholder="" 
                                            name="PtuNum2" 
                                            value="{{ old('PtuNum2') }}">
                
                                        @error('PtuNum2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                     
                                </div>
                                 {{-- Registered as Branch --}}
                                 <div class="form-group row  m-0 p-0  ">
                                    <div class="col-sm-12 m-0 p-0">
                                        
                                        <div class="form-check small m-0 p-0 pt-2">
                                            
                                            <label class="form-check-label" for="registration_type2">
                                                Registered as Branch?
                                            </label>
                                            <input class="form-check-input ml-3 " type="checkbox" value="Y" id="registration_type2" name ="registration_type2">
                                              
                                        </div>
                                        @error('registration_type2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                     
                                </div>
                            </div>

                            {{-- Address / Contact Details --}}
                            <div class="col-sm-6 m-0 p-2">
                                {{-- address_line1 --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-12 m-0 p-0">
                                        
                                        <label for="address_line11" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Address Line 1 <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('address_line11') is-invalid @enderror" 
                                            id="address_line11"
                                            placeholder="" 
                                            name="address_line11" 
                                            value="{{ old('address_line11') }}">
                
                                        @error('address_line11')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- address_line2 --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-12 m-0 p-0">
                                        
                                        <label for="address_line22" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Address Line 2  </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('address_line22') is-invalid @enderror" 
                                            id="address_line22"
                                            placeholder="" 
                                            name="address_line22" 
                                            value="{{ old('address_line22') }}">
                
                                        @error('address_line22')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- brgy/district/city --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-4 m-0 p-0">
                                        
                                        <label for="Barangay2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Barangay <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('Barangay2') is-invalid @enderror" 
                                            id="Barangay2"
                                            placeholder="" 
                                            name="Barangay2" 
                                            value="{{ old('Barangay2') }}">
                
                                        @error('Barangay2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 m-0 p-0">
                                        
                                        <label for="District2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">District  </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('District2') is-invalid @enderror" 
                                            id="District2"
                                            placeholder="" 
                                            name="District2" 
                                            value="{{ old('District2') }}">
                
                                        @error('District2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 m-0 p-0">
                                        
                                        <label for="City2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Town/City <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('City2') is-invalid @enderror" 
                                            id="City2"
                                            placeholder="" 
                                            name="City2" 
                                            value="{{ old('City2') }}">
                
                                        @error('City2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- province / zip code --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-8 m-0 p-0">
                                        
                                        <label for="Province2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Province <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('Province2') is-invalid @enderror" 
                                            id="Province2"
                                            placeholder="" 
                                            name="Province2" 
                                            value="{{ old('Province2') }}">
                
                                        @error('Province2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 m-0 p-0">
                                        
                                        <label for="ZipCode2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Zip Code <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('ZipCode2') is-invalid @enderror" 
                                            id="ZipCode2"
                                            placeholder="" 
                                            name="ZipCode2" 
                                            value="{{ old('ZipCode2') }}">
                
                                        @error('ZipCode2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                {{-- Business business_email_address / Contacts --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-6 m-0 p-0">
                                        
                                        <label for="Email2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Business E-mail Address <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="email" 
                                            autocomplete="off"
                                            class="form-control mt-n3 form-control-user rounded-0 @error('Email2') is-invalid @enderror" 
                                            id="Email2"
                                            placeholder="" 
                                            name="Email2" 
                                            value="{{ old('Email2') }}">
                
                                        @error('Email2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 m-0 p-0">
                                        
                                        <label for="contact_number2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Contact Number <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('contact_number2') is-invalid @enderror" 
                                            id="contact_number2"
                                            placeholder="" 
                                            name="contact_number2" 
                                            value="{{ old('contact_number2') }}">
                
                                        @error('contact_number2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                {{-- RDO --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-4 m-0 p-0">
                                        
                                        <label for="RDO2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">RDO <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('RDO2') is-invalid @enderror" 
                                            id="RDO2"
                                            placeholder="" 
                                            name="RDO2" 
                                            value="{{ old('RDO2') }}">
                
                                        @error('RDO2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 m-0 p-0 ">

                                        <div class="form-check small ml-2 mt-4">
                                            <input class="form-check-input " id="CalFiscal21" type="radio" value="c" name="CalFiscal2" checked>
                                            <label class="form-check-label" for="CalFiscal21">Calendar</label>
                                         
                                            <input class="form-check-input ml-2" id="CalFiscal22" type="radio" value="F"  name="CalFiscal2" >
                                            <label class="form-check-label pl-4  " for="CalFiscal22">Fiscal</label>
                                        </div>
                                         
                                        @error('CalFiscal2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3 m-0 p-0 mt-3 text-right">
                                        <label for="FiscalEnd2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-2 pl-1 pr-1">Fiscal End</span> </span> 
                                        </label>
                                    </div>
                                    <div class="col-sm-1 m-0 p-0  mt-3 ">
                                        <select class="form-control h6  m-0   p-1   rounded-0"  name="FiscalEnd2">
                                            <option value="01" selected>01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select> 
                                         
                                        @error('FiscalEnd2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                
                               {{-- VAT Type --}}
                               <div class="form-group row  m-0 p-0 pt-2 ">
                                    <div class="col-sm-2 m-0 p-0   pt-1 ">
                                        <label for="VatType2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-2 pl-1 pr-1">VAT Type</span> </span> 
                                        </label>
                                    </div>
                                    <div class="col-sm-4 m-0 p-0 ">

                                        
                                        <select class="form-control h6  m-0   p-1   rounded-0"  name="VatType2">
                                            <option value="0" selected>VAT Registered</option>
                                            <option value="1">Non-VAT Registered</option>
                                            
                                        </select> 
                                        
                                        @error('VatType2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            
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
    </div>

</div>


@endsection
@push('scripts')
    {{-- Navigation Tab Active Session --}}
    <script>
         
        if (sessionStorage.getItem("Individual")===null){
            sessionStorage.setItem("Individual", 'active show'   );
            sessionStorage.setItem("Corporate", "");
             
        }else{
            let individualClass = sessionStorage.getItem("Individual");
            $('#Individual-tab').removeClass('active');
            $('#Individual-tab').addClass(individualClass);
            
             
            let corporateClass = sessionStorage.getItem("Corporate");
            $('#Corporate-tab').removeClass('active');
            $('#Corporate-tab').addClass(corporateClass);
            $('#Corporate').removeClass('show');
            $('#Individual').removeClass('show');
            $('#Corporate').removeClass('active');
            $('#Individual').removeClass('active');
            if (corporateClass =="active"){
                
                $('#Corporate').addClass('active show');
            }else{
                $('#Individual').addClass('active show');
                
            }
             
        }
        $('#Individual-tab').click(function(){
            sessionStorage.setItem("Individual", 'active'   );
            sessionStorage.setItem("Corporate", "");
            // alert("sdf")
        });
        $('#Corporate-tab').click(function(){
            sessionStorage.setItem("Individual", ''   );
            sessionStorage.setItem("Corporate", "active");
            // alert("sdf2")
        });
        

    </script>
@endpush