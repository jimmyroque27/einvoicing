@extends('layouts.master')

@section('content')
<style>
    input.form-control, select.form-control{
        padding: 2px !important;
        /* margin: 2px 2px 2px 2px !important; */
        font-size: .9rem !important;
        height: 30px !important;
        border-radius: 0px;
    }
    
     
</style>

<div class="container-fluid m-0 p-0 rounded-0">

    

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow m-0 p-0 rounded-0 mb-4">
        <div class="card-header py-3">
            
            <div class="d-sm-flex align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">Edit Tax Payer</h6>
                @can('taxpayer-list')
                    <a href="{{route('taxpayers.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
                @endcan
            </div>
        </div>
        <div class="card-body  text-dark small">
            
            {!! Form::model($taxpayer, ['method' => 'PATCH','route' => ['taxpayers.update', $taxpayer->id]]) !!}
            <div class="row">

                <div class="col-sm-6 ">
                    <div class="row">
                        <div class="col-sm-4 mb-2">
                            <strong>Tax Payer Classification:</strong>

                             
                            
                            {!! Form::select('tp_classification', array('1' => 'Individual', '2' => 'Corporation' ), null , array('placeholder' => '','class' => 'form-control  ', "id"=>'tp_classification' )) !!}
                            @error('tp_classification')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-2">
                            <strong>Tax Payer's ID:</strong>
                            {!! Form::text('tp_id', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off', 'readonly','maxlength'=>'9')) !!}
                            @error('tp_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-2 corporation">
                            <strong>Tax Payer Type:</strong>

                             
                            
                            {!! Form::select('private_or_government', array('1' => 'Private', '2' => 'Government' ), null , array('placeholder' => '','class' => 'form-control  ', "id"=>'tp_classification' )) !!}
                            @error('private_or_government')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    
                    </div>
                    <div class="row individual">
                        <div class="col-sm-4 mb-2">
                            <strong>First Name:</strong>
                            {!! Form::text('first_name', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('first_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-2">
                            <strong>Middle Name:</strong>
                            {!! Form::text('middle_name', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('middle_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-2">
                            <strong>Last Name:</strong>
                            {!! Form::text('last_name', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('last_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row corporation">
                        <div class="col-sm-12 mb-2">
                            <strong>Registered Name:</strong>
                            {!! Form::text('registered_name', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('registered_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-4 mb-2">
                            <strong>TIN:</strong>
                            {!! Form::text('Tin', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off', 'maxlength'=>'9')) !!}
                            @error('Tin')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-2">
                            <strong>Branch Code:</strong>
                            {!! Form::text('TIN_BranchCode', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off', 'maxlength'=>'3')) !!}
                            @error('TIN_BranchCode')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-2 individual">
                            <strong>Date of Birth:</strong>
                            {!! Form::date('BirthDate', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('BirthDate')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    
                    </div>
                    <div class="row ">
                        <div class="col-sm-8 mb-2">
                            <strong>COR OCN:</strong>
                            {!! Form::text('cor_ocn', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('cor_ocn')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="col-sm-4 mb-2">
                            <strong>COR Issued Date:</strong>
                            {!! Form::date('cor_issued_date', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('cor_issued_date')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    
                    </div>
                    <div class="row ">
                        <div class="col-sm-8 mb-2">
                            <strong><span class='corporation'>SEC Registration No.:</span><span class='individual'>DTI Registration No.:</span></strong>
                            {!! Form::text('SEC_Registration_No', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('SEC_Registration_No')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="col-sm-4 mb-2">
                            <strong><span class='corporation'>SEC Registration Date:</span><span class='individual'>DTI Registration Date:</span></strong>
                            {!! Form::date('SEC_Registration_date', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('SEC_Registration_date')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    
                    </div>
                    <div class="row ">
                        <div class="col-sm-8 mb-2">
                            <strong>Line of Business / Industries:</strong>
                            {!! Form::text('industry', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('industry')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="col-sm-4 mb-2">
                            <strong>Registered Activities:</strong>
                            {!! Form::text('registered_activities', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('registered_activities')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    
                    </div>
                     
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <strong>Business/Trade Name:</strong>
                            {!! Form::text('trade_name', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('trade_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 mb-2">
                            <strong>Registered PTU No.:</strong>
                            {!! Form::text('PtuNum', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('PtuNum')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-2">
                            <strong>Registered as :</strong>
                            
                            
                            {!! Form::select('registration_type', array('C' => 'Contact Only', 'B' => 'Branch', 'M' => 'Main') , null  , array('placeholder' => '','class' => 'form-control  ' )) !!}
                            @error('registration_type')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                             
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <strong>Address Line 1:</strong>
                            {!! Form::text('address_line1', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('address_line1')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <strong>Address Line 2 :</strong>
                            {!! Form::text('address_line2', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('address_line2')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb-2">
                            <strong>Barangay:</strong>
                            {!! Form::text('Barangay', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('Barangay')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-2">
                            <strong>District:</strong>
                            {!! Form::text('District', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('District')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-2">
                            <strong>City/Town:</strong>
                            {!! Form::text('City', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('City')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8 mb-2">
                            <strong>Province:</strong>
                            {!! Form::text('Province', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('Province')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-2 mb-2">
                            <strong>Zip Code:</strong>
                            {!! Form::text('ZIPCode', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('ZIPCode')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-8 mb-2">
                            <strong>Business Email Address:</strong>
                            {!! Form::text('business_email_address', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('business_email_address')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-2">
                            <strong>Contact Numbers:</strong>
                            {!! Form::text('contact_number', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('contact_number')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb-2">
                            <strong>RDO:</strong>
                            {!! Form::text('RDO', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                            @error('RDO')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-2">
                            <strong>Calendar/Fiscal:</strong>
                            {!! Form::select('CalFiscal',  array('C' => 'Calendar', 'F' => 'Fiscal'), null , array('placeholder' => '','class' => 'form-control  ','id'=>'CalFiscal' )) !!}
                            @error('CalFiscal')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
 
                        </div>
                        <div class="col-sm-4 mb-2 Fiscal">
                            <strong>Fiscal:</strong>
                            <?php $indcorp = array("1"=>"01","2"=>"02","3"=>"03","4"=>"04","5"=>"05","6"=>"06","7"=>"07","8"=>"08","9"=>"09","10"=>"10","11"=>"11","12"=>"12");   ?>
                            
                            {!! Form::select('FiscalEnd',  $indcorp, null  , array('placeholder' => '','class' => 'form-control w-50 ','id'=>'FiscalEnd' )) !!}
                            @error('FiscalEnd')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
 
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb-2">
                            <strong>VAT Registration:</strong>
                            
                            
                            {!! Form::select('vat_registered',  array('0' => 'VAT Registered', '1' => 'Non-VAT Registered'), null , array('placeholder' => '','class' => 'form-control  ' )) !!}
                            @error('vat_registered')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
    
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row mb-4">
                <hr/>
                
 
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <button type="submit" class="btn btn-primary col-sm-12">Save</button>
                </div>
                
            </div>
            {!! Form::close() !!}
        </div>
    </div>

</div>


@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            // alert($('#tp_classification').val())
            showIndividualOrCorporation()

        });
        $('#tp_classification').change(function(){
            showIndividualOrCorporation()
        });
         
        showFiscal();
        $('#CalFiscal').change(function(){
            showFiscal();
        });
        function showFiscal(){
            $('.Fiscal').hide();
            if ($('#CalFiscal').val()=='F'){
                
                $('.Fiscal').show();
                 
            }
        }
        function showIndividualOrCorporation(){
            if ($('#tp_classification').val()=='2')
            {   
                $('.individual').hide();
                $('.corporation').show();
            }else{
                $('.corporation').hide();
                $('.individual').show();
            }
                
        }
    </script>
@endpush