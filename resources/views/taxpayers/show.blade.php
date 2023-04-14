@extends('layouts.master')

@section('content')

<div class="container-fluid m-0 p-0 rounded-0">
    <style>
        input.form-control, select.form-control{
            padding: 2px !important;
            /* margin: 2px 2px 2px 2px !important; */
            font-size: .9rem !important;
            color: #0165c2 !important;
            height: 30px !important;
        }
        input:read-only.form-control , select:read-only.form-control {
            background-color: rgba(247, 247, 247, 0.356) !important;
        }
         
    </style>
     

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- Form Registration -->
    <div class="card shadow m-0 p-0  mb-4  rounded-0">
        <div class="card-header p-2 m-0 bg-light rounded-0  ">
            <div class="row p-0 m-0">
                <div class="col-sm-3">
                    <h5 class="m-1 text-dark">Tax Payer's Information </h5> 
                </div>
                 @if($taxpayer->tp_classification==2)
                    <div class=" bg-info p-1 m-0 rounded text-white"><h6 class="m-1  text-center">CORPORATION</h6></div>
                    <div class=" bg-dark  p-1 m-0  ml-1 rounded text-white"><h6 class="m-1   text-center">{{($taxpayer->tp_classification==="2")?"Government":"Private"}}</h6></div>
                @else
                    <div class=" bg-dark p-1 m-0 rounded text-white"><h6 class="m-1  text-center">INDIVIDUAL</h6></div>
                    
                @endif
            </div>
        </div>
        <div class="card-body rounded-0  p-1 ">
                     
                    <div class="form-group row m-0 p-0">
                        {{-- Business Details --}}
                        <div class="col-sm-6 m-0 p-2">
                           
                            {{-- Complete Name --}}
                            <div class="form-group row  m-0 p-0">
                                @if($taxpayer->tp_classification==2)
                                    
                                            
                                    <label for="registered_name" class="col-sm-12 pl-1">
                                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Registered Name<span style="color:red;">*</span> </span> 
                                    </label>
                                    <input 
                                        type="text" readonly 
                                        class="form-control mt-n3 form-control-user rounded-0 @error('registered_name') is-invalid @enderror" 
                                        id="registered_name"
                                        placeholder="" 
                                        name="registered_name" 
                                        value="{{ $taxpayer->registered_name }}">
            
                                    
                                
                                @else
                                    <div class="col-sm-4 m-0 p-0">
                                        
                                        <label for="first_name" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">First Name<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" readonly 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('first_name') is-invalid @enderror" 
                                            id="first_name"
                                            placeholder="" 
                                            name="first_name" 
                                            value="{{ $taxpayer->first_name }}">
                
                                        
                                    </div>
                                    <div class="col-sm-4  m-0 p-0">
                                        
                                        <label for="middle_name" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Middle Name<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" readonly
                                            class="form-control mt-n3 form-control-user rounded-0 @error('middle_name') is-invalid @enderror" 
                                            id="middle_name"
                                            placeholder="" 
                                            name="middle_name" 
                                            value="{{ $taxpayer->middle_name }}">
                
                                        
                                    </div>
                                    <div class="col-sm-4  m-0 p-0">
                                        
                                        <label for="last_name" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Last Name<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" readonly
                                            class="form-control mt-n3 form-control-user rounded-0 @error('last_name') is-invalid @enderror" 
                                            id="last_name"
                                            placeholder="" 
                                            name="last_name" 
                                            value="{{ $taxpayer->last_name }}">
                
                                        
                                    </div>
                                @endif
                                
                            </div>
                            {{-- TP ID --}}
                            <div class="form-group row  m-0 p-0">
                               
                                <div class="col-sm-4 m-0 p-0 pr-1">
                                    
                                    <label for="tp_id" class="col-sm-12 pl-1">
                                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">TP ID [Auto Generate] </span> 
                                    </label>
                                    <input 
                                        type="text" readonly
                                        class="form-control intNumber mt-n3 form-control-user rounded-0 @error('tp_id') is-invalid @enderror" 
                                        id="tp_id"
                                        placeholder="" 
                                        maxlength="9"
                                        name="tp_id" 
                                        value="{{ $taxpayer->tp_id }}">
             
                                </div>
                            </div>
                            {{-- TIN/Branch/Birth Date --}}
                            <div class="form-group row  m-0 p-0">
                                <div class="col-sm-4 m-0 p-0 pr-1">
                                    
                                    <label for="Tin" class="col-sm-12 pl-1">
                                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">TIN<span style="color:red;">*</span> </span> 
                                    </label>
                                    <input 
                                        type="text" readonly
                                        class="form-control intNumber mt-n3 form-control-user rounded-0 @error('Tin') is-invalid @enderror" 
                                        id="Tin"
                                        placeholder="" 
                                        maxlength="9"
                                        name="Tin" 
                                        value="{{ $taxpayer->Tin }}">
             
                                </div>
                                <div class="col-sm-4 m-0 p-0 pr-1">
                                    
                                    <label for="TIN_BranchCode" class="col-sm-12 pl-1">
                                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Branch Code  </span> 
                                    </label>
                                    <input 
                                        type="text"  readonly
                                        class="form-control mt-n3 form-control-user rounded-0 @error('TIN_BranchCode') is-invalid @enderror" 
                                        id="TIN_BranchCode"
                                        placeholder="" 
                                        name="TIN_BranchCode" 
                                        value="{{ $taxpayer->TIN_BranchCode }}">
             
                                </div>
                                <div class="col-sm-4  m-0 p-0  ">
                                    @if($taxpayer->tp_classification!=2)
                                        <label for="BirthDate" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Date of Birth<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="date" readonly
                                            class="form-control mt-n3 form-control-user rounded-0 @error('BirthDate') is-invalid @enderror" 
                                            id="BirthDate"
                                            placeholder="" 
                                            name="BirthDate" 
                                            value="{{ $taxpayer->BirthDate }}">
                                    @endif
             
                                </div>
                                    
                            </div>
                            {{-- COR --}}
                            {{-- DTI / SEC --}}
                            <div class="form-group row  m-0 p-0 ">
                                <div class="col-sm-8 m-0 p-0  pr-1">
                                    
                                    <label for="cor_ocn" class="col-sm-12 pl-1">
                                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">COR OCN<span style="color:red;">*</span> </span> 
                                    </label>
                                    <input 
                                        type="text" readonly
                                        class="form-control mt-n3 form-control-user rounded-0 @error('cor_ocn') is-invalid @enderror" 
                                        id="cor_ocn"
                                        placeholder="" 
                                        name="cor_ocn" 
                                        value="{{ $taxpayer->cor_ocn }}">
             
                                </div>
                                <div class="col-sm-4  m-0 p-0 ">
                                    
                                    <label for="cor_issued_date" class="col-sm-12 pl-1">
                                        <span class="h6 small bg-white text-muted   pt-1 pl-1 pr-1">COR Issued Date<span style="color:red;">*</span> </span> 
                                    </label>
                                    <input 
                                        type="date" readonly
                                        class="form-control mt-n3 form-control-user rounded-0 @error('cor_issued_date') is-invalid @enderror" 
                                        id="cor_issued_date"
                                        placeholder="" 
                                        name="cor_issued_date" 
                                        value="{{ $taxpayer->cor_issued_date }}">
             
                                </div>
                                    
                            </div>
                            @if($taxpayer->tp_classification!=2)
                            {{-- DTI --}}
                            <div class="form-group row  m-0 p-0 ">
                                <div class="col-sm-8 m-0 p-0  pr-1">
                                    
                                    <label for="SEC_Registration_No" class="col-sm-12 pl-1">
                                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">License / DTI Registration No. <span style="color:red;">*</span> </span> 
                                    </label>
                                    <input 
                                        type="text" readonly
                                        class="form-control mt-n3 form-control-user rounded-0 @error('SEC_Registration_No') is-invalid @enderror" 
                                        id="SEC_Registration_No"
                                        placeholder="" 
                                        name="SEC_Registration_No" 
                                        value="{{ $taxpayer->SEC_Registration_No }}">
            
                                </div>
                                <div class="col-sm-4  m-0 p-0 ">
                                    
                                    <label for="SEC_Registration_date" class="col-sm-12 pl-1">
                                        <span class="h6 small bg-white text-muted   pt-1 pl-1 pr-1">DTI Registration Date<span style="color:red;">*</span> </span> 
                                    </label>
                                    <input 
                                        type="date" readonly
                                        class="form-control mt-n3 form-control-user rounded-0 @error('SEC_Registration_date') is-invalid @enderror" 
                                        id="SEC_Registration_date"
                                        placeholder="" 
                                        name="SEC_Registration_date" 
                                        value="{{ $taxpayer->SEC_Registration_date }}">
            
                                </div>
                                    
                            </div>
                            
                            @else
                                {{-- SEC --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-8 m-0 p-0  pr-1">
                                        
                                        <label for="SEC_Registration_No" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">SEC Registration No. <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" readonly
                                            class="form-control mt-n3 form-control-user rounded-0 @error('SEC_Registration_No') is-invalid @enderror" 
                                            id="SEC_Registration_No"
                                            placeholder="" 
                                            name="SEC_Registration_No" 
                                            value="{{ $taxpayer->SEC_Registration_No }}">
                
                                    </div>
                                    <div class="col-sm-4  m-0 p-0 ">
                                        
                                        <label for="SEC_Registration_date" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted   pt-1 pl-1 pr-1">SEC Registration Date<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="date" readonly
                                            class="form-control mt-n3 form-control-user rounded-0 @error('SEC_Registration_date') is-invalid @enderror" 
                                            id="SEC_Registration_date"
                                            placeholder="" 
                                            name="SEC_Registration_date" 
                                            value="{{ $taxpayer->SEC_Registration_date }}">
                
                                    </div>
                                        
                                </div>
                            @endif
                            
                            {{-- Industries/Registered Activities --}}
                            <div class="form-group row  m-0 p-0 ">
                                <div class="col-sm-8 m-0 p-0  pr-1">
                                    
                                    <label for="industry" class="col-sm-12 pl-1">
                                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Line of Business / Industries<span style="color:red;">*</span> </span> 
                                    </label>
                                    <input 
                                        type="text" readonly
                                        class="form-control mt-n3 form-control-user rounded-0 @error('industry') is-invalid @enderror" 
                                        id="industry"
                                        placeholder="" 
                                        name="industry" 
                                        value="{{ $taxpayer->industry }}">
             
                                </div>
                                <div class="col-sm-4  m-0 p-0 ">
                                    
                                    <label for="registered_activities" class="col-sm-12 pl-1">
                                        <span class="h6 small bg-white text-muted   pt-1 pl-1 pr-1">Registered Activities<span style="color:red;">*</span> </span> 
                                    </label>
                                    <input 
                                        type="text" readonly
                                        class="form-control mt-n3 form-control-user rounded-0 @error('registered_activities') is-invalid @enderror" 
                                        id="registered_activities"
                                        placeholder="" 
                                        name="registered_activities" 
                                        value="{{ $taxpayer->registered_activities }}">
             
                                </div>
                                    
                            </div>


                            {{-- Business/Trade Name --}}
                            <div class="form-group row  m-0 p-0 ">
                                <div class="col-sm-12 m-0 p-0  pr-1">
                                    
                                    <label for="trade_name" class="col-sm-12 pl-1">
                                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Business / Trade Name<span style="color:red;">*</span> </span> 
                                    </label>
                                    <input 
                                        type="text" readonly
                                        class="form-control mt-n3 form-control-user rounded-0 @error('trade_name') is-invalid @enderror" 
                                        id="trade_name"
                                        placeholder="" 
                                        name="trade_name" 
                                        value="{{ $taxpayer->trade_name }}">
             
                                </div>
                            </div>
                            {{-- PTU Number --}}
                            <div class="form-group row  m-0 p-0 ">
                                <div class="col-sm-12 m-0 p-0  pr-1">
                                    
                                    <label for="PtuNum" class="col-sm-12 pl-1">
                                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Registered PTU Number<span style="color:red;">*</span> </span> 
                                    </label>
                                    <input 
                                        type="text" readonly
                                        class="form-control mt-n3 form-control-user rounded-0 @error('PtuNum') is-invalid @enderror" 
                                        id="PtuNum"
                                        placeholder="" 
                                        name="PtuNum" 
                                        value="{{ $taxpayer->PtuNum }}">
             
                                </div>
                            </div>
                            {{-- Registered as Branch --}}
                            <div class="form-group row  m-0 p-0  ">
                                <div class="col-sm-12 m-0 p-0">
                                    
                                    <div class="form-check small m-0 p-0 pt-2">
                                        
                                        <label class="form-check-label" for="registration_type">
                                            Registered as Branch?
                                        </label>
                                         
                                        <input disabled class="form-check-input ml-3 " type="checkbox" value="{{$taxpayer->registration_type}}" {{ ($taxpayer->registration_type ==="Y")? "checked":"disabled" }} id="registration_type">
                                            
                                    </div>
                                     
                                </div>
                                    
                                    
                            </div>
                        </div>

                        {{-- Address / Contact Details --}}
                        <div class="col-sm-6 m-0 p-2">
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
                                        value="{{ $taxpayer->address_line1 }}">
            
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
                                        value="{{ $taxpayer->address_line2 }}">
             
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
                                        value="{{ $taxpayer->Barangay }}">
             
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
                                        value="{{ $taxpayer->District }}">
             
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
                                        value="{{  $taxpayer->City }}">
             
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
                                        value="{{ $taxpayer->Province }}">
            
                                     
                                </div>
                                <div class="col-sm-4 m-0 p-0">
                                    
                                    <label for="ZIPCode" class="col-sm-12 pl-1">
                                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Zip Code<span style="color:red;">*</span> </span> 
                                    </label>
                                    <input 
                                        type="text" readonly
                                        class="form-control mt-n3 form-control-user rounded-0 @error('ZIPCode') is-invalid @enderror" 
                                        id="ZIPCode"
                                        placeholder="" 
                                        name="ZIPCode" 
                                        value="{{ $taxpayer->ZIPCode }}">
             
                                </div>
                                    
                            </div>
                            {{-- Business business_email_address / Contacts --}}
                            <div class="form-group row  m-0 p-0 ">
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
                                        value="{{ $taxpayer->business_email_address }}">
             
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
                                        value="{{ $taxpayer->contact_number }}">
             
                                </div>
                                    
                            </div>
                            {{-- RDO --}}
                            <div class="form-group row  m-0 p-0 ">
                                <div class="col-sm-4 m-0 p-0">
                                    
                                    <label for="RDO" class="col-sm-12 pl-1">
                                        <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">RDO<span style="color:red;">*</span> </span> 
                                    </label>
                                    <input 
                                        type="text" readonly
                                        class="form-control mt-n3 form-control-user rounded-0 @error('RDO') is-invalid @enderror" 
                                        id="RDO"
                                        placeholder="" 
                                        name="RDO" 
                                        value="{{ $taxpayer->RDO }}">
             
                                </div>
                                <div class="col-sm-4 m-0 p-0 ">

                                    <div class="form-check small ml-2 mt-4">
                                        <input readonly class="form-check-input " id="CalFiscal1" type="radio" name="CalFiscal" {{ ($taxpayer->CalFiscal ==="C")? "checked":"disabled" }}>
                                        <label class="form-check-label" for="CalFiscal1">Calendar</label>
                                        
                                        <input readonly class="form-check-input ml-2" id="CalFiscal2" type="radio" name="CalFiscal" {{ ($taxpayer->CalFiscal ==="F")? "checked":"disabled" }} >
                                        <label class="form-check-label pl-4  " for="CalFiscal2">Fiscal</label>
                                    </div>
                                         
                                </div>
                                <div class="col-sm-3 m-0 p-0 mt-3 text-right">
                                    <label for="FiscalEnd" class="col-sm-12 pl-1">
                                        <span class="h6 small bg-white text-muted pt-2 pl-1 pr-1">Fiscal End :</span> </span> 
                                    </label>
                                </div>
                                <div class="col-sm-1 m-0 p-0 pt-1 text-primary mt-3 small ">
                                    {{ $taxpayer->FiscalEnd }}
                                       
                                </div>
                                    
                            </div>
                            {{-- VAT Type --}}
                            <div class="form-group row  m-0 p-0  ">
                                <div class="col-sm-6 m-0 p-0    ">
                                    <label for="vat_registered" class="col-sm-12 pl-1">
                                        <span class="h6 small bg-white text-muted pt-2 pl-1 pr-1">VAT Type :
                                            <span class="text-primary">
                                                @if($taxpayer->vat_registered ==1)
                                                    Non-VAT Registered
                                                @else
                                                    VAT Registered
                                                @endif    
                                            </span>
                                        </span>  
                                        
                                    </label>
                                </div>
                                 
                            </div>
                            
                        </div>
                        
                    </div>  
    
                     
    
                    
             

 
             

 

            
        </div>
    </div>

</div>


@endsection
 