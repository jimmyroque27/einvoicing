@extends('layouts.master')

@section('content')
<style>
    input.form-control, select.form-control, textarea.form-control{
        padding: 1px !important;
        /* margin: 2px 2px 2px 2px !important; */
        font-size: .9rem !important;
        height: 30px !important;
        border-radius: 0px;
    }
    .bootstrap-select>button{
        padding: 2px !important;
        /* margin: 2px 2px 2px 2px !important; */

        font-size: .9rem !important;
        border: 1px #b6b6b6 solid !important;
        height: 30px !important;
        border-radius: 0px !important;
    }
    .dataTable{
        font-size: .8em !important;
        
    }
</style>
<div class="container-fluid m-0 p-0 rounded-0">

    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Edit Users</h1>
        <a href="{{route('product.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> --}}

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow m-0 p-0 rounded-0 mb-2">
        <div class="card-header py-3">
            
            <div class="d-sm-flex align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">Edit Invoice</h6>
                @can('invoice-list')
                    <a href="{{route('invoices.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-arrow-left fa-sm text-white-50"></i> Back Invoice List</a>
                @endcan
            </div>
        </div>
        <div class="card-body  ">
            
            {!! Form::model($invoice, ['method' => 'PATCH','route' => ['invoices.update', $invoice->id]]) !!}
             
            


            <div class="form-group row m-0 p-0">
                {{-- Customer Order Information --}}
                <div class="col-md-2 p-0 pr-1">
                    <div class="row m-0 p-0">
                        <div class="col-md-10  m-0 p-0"   >
                             
                             <label for="buyer_name"   class="m-0 p-0"  >
                                <span class="h6 small ">Customer No.:  </span> 
                            </label>
                            {!! Form::text('buyer_id', null, array('placeholder' => '','class' => 'form-control m-0  p-1  ','autocomplete'=>'off','id'=>'buyer_id' )) !!}
                            @error('buyer_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-1 m-0 p-0 pt-4" >
                            <a href="#" id="getBuyer" class="btn btn-dark rounded-0 m-0 p-0 check-btn  ">
                                <i class="fas fa-fw fa-check"></i>
                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 pr-3 p-0">
                    <label for="buyer_name"   class="m-0 p-0"  >
                        <span class="h6 small ">Name:  </span> 
                    </label>
                    {!! Form::text('buyer_name', $invoice->RegNm, array('placeholder' => '','class' => 'form-control m-0  p-1  ','autocomplete'=>'off','readonly','id'=>'buyer_name')) !!}
                    
                    <select  id="customer_id"  name="customer_name"   class="selectpicker ajax-buyer w-100" data-live-search="true"></select>
                    
                    @error('buyer_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-2 p-0 pr-1">
                    <label for="InvoiceNumber" class="m-0 p-0"  >
                        <span class="h6 small ">Invoice No.: </span> 
                    </label>
                    {!! Form::text('InvoiceNumber', null, array('placeholder' => '','class' => 'form-control m-0  p-1  ','autocomplete'=>'off','readonly','id'=>'InvoiceNumber')) !!}
                    
                </div>
                
                <div class="col-md-2  p-0 pr-1">
                    <label for="InvoiceDate" class="m-0 p-0"  >
                        <span class="h6 small ">Issued Date: </span> 
                    </label>
                    {!! Form::date('InvoiceDate', null, array('placeholder' => '','class' => 'form-control m-0  p-1  ','autocomplete'=>'off', 'id'=>'InvoiceDate')) !!}
                    @error('InvoiceDate')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row m-0 p-0">
                <div class="col-md-2 p-0 pr-1">
                    <label for="OrderNumber" class="m-0 p-0"  >
                        <span class="h6 small ">Order No.: </span> 
                    </label>
                    {!! Form::text('OrderNumber', null, array('placeholder' => '','class' => 'form-control m-0  p-1  ','autocomplete'=>'off', 'id'=>'OrderNumber')) !!}
                    

                    @error('OrderNumber')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-5  p-0 mr-0">
                    <label for="OrderDate" class="m-0 p-0" >
                        <span class="h6 small ">Order Date: </span> 
                    </label>
                    {!! Form::date('OrderDate', null, array('placeholder' => '','class' => 'form-control m-0  p-1 w-25 ','autocomplete'=>'off', 'id'=>'OrderDate')) !!}
                     

                    @error('OrderDate')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                
                            
                <div class="col-md-2 pr-3 p-0">
                    {!! Form::hidden('Currency', null, array('placeholder' => '','class' => 'form-control m-0  p-1  ','autocomplete'=>'off', 'id'=>'Currency')) !!}
                    {!! Form::hidden('ForCur', null, array('placeholder' => '','class' => 'form-control m-0  p-1  ','autocomplete'=>'off', 'id'=>'ForCur')) !!}
                    <label for="buyer_name"   class="m-0 p-0"  >
                        <span class="h6 small ">Currency:  </span> 
                    </label>
                    
                    <select  id="currency_id"  name="currency_id"  value = "old('currency_id')?old('currency_id'):0 " class="selectpicker ajax-currency w-100" data-live-search="true"></select>
                     

                    @error('currency_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-1 p-0 pr-1">
                    <label for="ConvRate" class="m-0 p-0"  >
                        <span class="h6 small ">Rate: </span> 
                    </label>
                    {!! Form::text('ConvRate',  old('ConvRate')?old('ConvRate'):null  , array('placeholder' => '','class' => 'form-control m-0  p-1 floatNumber ','autocomplete'=>'off', 'id'=>'ConvRate')) !!}
                     
                    @error('ConvRate')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    
                </div>
                <div class="col-md-2 p-0 pr-1">
                    <label for="ForexAmt" class="m-0 p-0"  >
                        <span class="h6 small ">Converted Amount </span> 
                    </label>
                    {!! Form::text('ForexAmt',  old('ForexAmt')?old('ForexAmt'):null  , array('placeholder' => '','class' => 'form-control m-0  p-1 floatNumber ','autocomplete'=>'off', 'readonly','id'=>'ForexAmt')) !!}
                      

                    @error('ForexAmt')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    
                </div>
                
            </div>
            <div class="form-group row m-0 mt-2 mb-4 p-0">
                 
                {{ $dataTable->table(['class' => 'table table-bordered table-stripe'] ) }}
             
                 
            </div>
            {{-- Summary Total Information --}}
            <div class="form-group row m-0 p-0 mt-2">
                {{-- Discount Information --}}
                <div class="col-sm-4 m-0 p-2 table-bordered">
                    <table class="table  text-dark small m-0   ">
                        <tr>
                            <td class="m-0 p-0 pb-2 border-0 " colspan="2">
                                
                                    <span class="h6 text-info">Discount Information</span> 
                             
                            </td>
                             
                        </tr>
                        <tr>
                            <td class="m-0 p-0 border-0 w-50">
                                <label for="TotNetItemSales"  class="m-0 p-1" >
                                    <span class="h6 small ">Senior Citizen </span> 
                                </label>
                            </td>
                            <td class="m-0 p-0 border-0">
                                {!! Form::text('ScAmt', old('ScAmt')?old('ScAmt'):null , array('placeholder' => '','class' => 'form-control m-0  p-1  floatNumber','autocomplete'=>'off', 'id'=>'ScAmt')) !!}
                                @error('ScAmt')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                 
                            </td>
                        </tr>
                        <tr>
                            <td class="m-0 p-0 border-0">
                                <label for="VATableSales"  class="m-0 p-1" >
                                    <span class="h6 small ">PWD Discount</span> 
                                </label>
                            </td>
                            <td class="m-0 p-0 border-0">
                                {!! Form::text('PwdAmt', old('PwdAmt')?old('PwdAmt'):null , array('placeholder' => '','class' => 'form-control m-0  p-1  floatNumber','autocomplete'=>'off', 'id'=>'PwdAmt')) !!}
                                @error('PwdAmt')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                 
                            </td>
                        </tr>
                        <tr>
                            <td class="m-0 p-0 border-0">
                                <label for="RegAmt"  class="m-0 p-1" >
                                    <span class="h6 small ">Regular Discount </span> 
                                </label>
                            </td>
                            <td class="m-0 p-0 border-0">
                                {!! Form::text('RegAmt', old('RegAmt')?old('RegAmt'):null , array('placeholder' => '','class' => 'form-control m-0  p-1  floatNumber','autocomplete'=>'off', 'id'=>'RegAmt')) !!}
                                @error('RegAmt')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                 
                            </td>
                        </tr>
                        <tr>
                            <td class="m-0 p-0 border-0">
                                <label for="SpeAmt"  class="m-0 p-1" >
                                    <span class="h6 small ">Special Discount </span> 
                                </label>
                            </td>
                            <td class="m-0 p-0 border-0">
                                {!! Form::text('SpeAmt', old('SpeAmt')?old('SpeAmt'):null , array('placeholder' => '','class' => 'form-control m-0  p-1  floatNumber','autocomplete'=>'off', 'id'=>'SpeAmt')) !!}
                                @error('SpeAmt')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                 
                            </td>
                        </tr>
                        <tr>
                            <td class="m-0 p-0 border-0">
                                <label for="Rmk2"  class="m-0 p-1" >
                                    <span class="h6 small ">Remarks </span> 
                                </label>
                            </td>
                            <td class="m-0 p-0 border-0">
                                {!! Form::text('Rmk2', old('Rmk2')?old('Rmk2'):null , array('placeholder' => '','class' => 'form-control m-0  p-1  ','autocomplete'=>'off', 'id'=>'Rmk2')) !!}
                                @error('Rmk2')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                  
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Value Added Tax Information --}}
                <div class="col-sm-4 m-0 p-2 table-bordered">
                    <table class="table  text-dark small m-0   ">
                        <tr>
                            <td class="m-0  p-0 pb-2 border-0 w-50" colspan="2">
                               
                                    <span class="h6 text-info">Tax Information</span> 
                                
                            </td>
                             
                        </tr>
                        
                        <tr>
                            <td class="m-0 p-0 border-0">
                                <label for="VATableSales"  class="m-0 p-1" >
                                    <span class="h6 small ">VATable Sales </span> 
                                </label>
                            </td>
                            <td class="m-0 p-0 border-0">
                                {!! Form::text('VATableSales', old('VATableSales')?old('VATableSales'):null , array('placeholder' => '','class' => 'form-control m-0  p-1  floatNumber','autocomplete'=>'off','readonly', 'id'=>'VATableSales')) !!}
                                @error('VATableSales')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                 
                            </td>
                        </tr>
                        <tr>
                            <td class="m-0 p-0 border-0">
                                <label for="VATAmt"  class="m-0 p-1" >
                                    <span class="h6 small ">VAT Amount</span> 
                                </label>
                            </td>
                            <td class="m-0 p-0 border-0">
                                {!! Form::text('VATAmt', old('VATAmt')?old('VATAmt'):null , array('placeholder' => '','class' => 'form-control m-0  p-1  floatNumber','autocomplete'=>'off','readonly', 'id'=>'VATAmt')) !!}
                                @error('VATAmt')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                 
                            </td>
                        </tr>
                        <tr>
                            <td class="m-0 p-0 border-0">
                                <label for="WithholdIncome"  class="m-0 p-1" >
                                    <span class="h6 small ">Withholding Tax - Income Tax</span> 
                                </label>
                            </td>
                            <td class="m-0 p-0 border-0">
                                {!! Form::text('WithholdIncome', old('WithholdIncome')?old('WithholdIncome'):null , array('placeholder' => '','class' => 'form-control m-0  p-1  floatNumber','autocomplete'=>'off','readonly', 'id'=>'WithholdIncome')) !!}
                                @error('WithholdIncome')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                 
                            </td>
                        </tr>
                        <tr>
                            <td class="m-0 p-0 border-0">
                                <label for="WithholdBusVAT"  class="m-0 p-1" >
                                    <span class="h6 small ">Withholding Tax-Business VAT</span> 
                                </label>
                            </td>
                            <td class="m-0 p-0 border-0">
                                {!! Form::text('WithholdBusVAT', old('WithholdBusVAT')?old('WithholdBusVAT'):null , array('placeholder' => '','class' => 'form-control m-0  p-1  floatNumber','autocomplete'=>'off',  'id'=>'WithholdBusVAT')) !!}
                                @error('WithholdBusVAT')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                
                            </td>
                        </tr>
                        <tr>
                            <td class="m-0 p-0 border-0">
                                <label for="WithholdBusPT"  class="m-0 p-1" >
                                    <span class="h6 small ">Withholding Tax - Business %</span> 
                                </label>
                            </td>
                            <td class="m-0 p-0 border-0">
                                {!! Form::text('WithholdBusPT', old('WithholdBusPT')?old('WithholdBusPT'):null , array('placeholder' => '','class' => 'form-control m-0  p-1  floatNumber','autocomplete'=>'off',  'id'=>'WithholdBusPT')) !!}
                                @error('WithholdBusPT')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                 
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-4 m-0 p-2 table-bordered ">
                    <table class="table   text-dark small m-0   ">
                        <tr>
                            <td class="m-0  p-0 pb-2 border-0 w-50" colspan="2">
                                
                                    <span class="h6 text-info">Net Amount Summary</span> 
                              
                            </td>
                             
                        </tr>
                        <tr>
                            <td class="m-0 p-0 border-0 ">
                                <label for="TotNetItemSales"  class="m-0 p-1" >
                                    <span class="h6 small ">Total Sales </span> 
                                </label>
                            </td>
                            <td class="m-0 p-0 border-0">
                                {!! Form::text('TotNetItemSales', old('TotNetItemSales')?old('TotNetItemSales'):null , array('placeholder' => '','class' => 'form-control m-0  p-1  floatNumber','autocomplete'=>'off', 'readonly', 'id'=>'TotNetItemSales')) !!}
                                @error('TotNetItemSales')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                 
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td class="m-0 p-0 border-0 w-50">
                                <label for="TotNetSalesAftDisct"  class="m-0 p-1" >
                                    <span class="h6 small ">Net Sales After Discount </span> 
                                </label>
                            </td>
                            <td class="m-0 p-0 border-0">
                                {!! Form::text('TotNetSalesAftDisct', old('TotNetSalesAftDisct')?old('TotNetSalesAftDisct'):null , array('placeholder' => '','class' => 'form-control m-0  p-1  floatNumber','autocomplete'=>'off', 'readonly', 'id'=>'TotNetSalesAftDisct')) !!}
                                @error('TotNetSalesAftDisct')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                 
                            </td>
                        </tr>
                         
                        <tr>
                            <td class="m-0 p-0 border-0 w-50">
                                <label for="OtherTaxRev"  class="m-0 p-1" >
                                    <span class="h6 small ">Other Taxable Revenue</span> 
                                </label>
                            </td>
                            <td class="m-0 p-0 border-0">
                                {!! Form::text('OtherTaxRev', old('OtherTaxRev')?old('OtherTaxRev'):null , array('placeholder' => '','class' => 'form-control m-0  p-1  floatNumber','autocomplete'=>'off',  'id'=>'OtherTaxRev')) !!}
                                @error('OtherTaxRev')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                
                            </td>
                        </tr>
                        <tr>
                            <td class="m-0 p-0 border-0 w-50">
                                <label for="OtherNonTaxCharge"  class="m-0 p-1" >
                                    <span class="h6 small ">Other Non-taxable charges</span> 
                                </label>
                            </td>
                            <td class="m-0 p-0 border-0">
                                {!! Form::text('OtherNonTaxCharge', old('OtherNonTaxCharge')?old('OtherNonTaxCharge'):null , array('placeholder' => '','class' => 'form-control m-0  p-1  floatNumber','autocomplete'=>'off',  'id'=>'OtherNonTaxCharge')) !!}
                                @error('OtherNonTaxCharge')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                 
                            </td>
                        </tr>
                        <tr>
                            <td class="m-0 p-0 border-0 w-50">
                                <label for="NetAmtPay"  class="m-0 p-1" >
                                    <span class="h6 small text-primary">Net Amount Payable </span> 
                                </label>
                            </td>
                            <td class="m-0 p-0 border-0">
                                {!! Form::text('NetAmtPay', old('NetAmtPay')?old('NetAmtPay'):null , array('placeholder' => '','class' => 'form-control m-0  p-1  floatNumber','autocomplete'=>'off', 'readonly', 'id'=>'NetAmtPay')) !!}
                                @error('NetAmtPay')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                 
                            </td>
                        </tr>
                    </table>
                </div>
                
            </div>
            


            <hr/>
            <div class="row">  
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

</div>


@endsection
@push('scripts')

    <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    {{$dataTable->scripts()}}

    {{-- Check Customer ID --}}
    <script>
        $("#getBuyer").click(function(){
            
            $('.check-btn').removeClass('checked');
            if($("#buyer_id").val()!=""){
                var getTP_url = "/contacts/getBuyer/"+$("#buyer_id").val() ;
                // alert(getTP_url)
                $.ajax({url: getTP_url ,                  
                    success: function(data) {
                        if ($.trim(data)){
                            $('.check-btn').addClass('checked');
                            $("#buyer_name").val(data[0]['registered_name']);
                            $('.check-btn-item').addClass('checked');
                            
                            $("#customer_id").val(data[0]['company_id']);
                            $('.selectpicker').val(data[0]['registered_name']);
                            $('#customer_id').selectpicker('render');
                            
                            $('#customer_id').selectpicker('hide');
                            $('#buyer_name').show();

                        }else{
                            Swal.fire( 'Customer/Buyer Not Found!')  
                            $("#buyer_name").val('');  
                            $("#buyer_id").val('');  
                            $('#customer_id.selectpicker').val('');
                            $('#customer_id').selectpicker('show');
                            $('#customer_id').selectpicker('render');
                        } 
                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        Swal.fire( 'Error during process!')  
                    }
                });
            }
        
        });
    </script>


    {{-- Search Customer/Buyer - Select picker --}}
    <script>
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            $('.selectpicker').selectpicker('mobile');
        }

        var path2 = "{{ route('contacts.buyersList') }}";
        var select_buyer = {
            // dropdownParent: $("#addItemModal"),
            ajax          : {
                url     :  path2,
                type    : 'get',
                dataType: 'json',
                data    : function() { // This is a function that is run on every request
                    return {
                        id:$(".ajax-buyer input").val() //this is an input search parameter
                    };
                },
                success: function(data) {

                    //    alert(  JSON.stringify(data));
                
                    
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(xhr.responseText +status + error);
                }
                
            },
            locale        : {
                emptyTitle: 'Select Buyer'
            },
            preserveSelected: false,
            clearOnEmpty: true,
            cache: false,
            emptyRequest: true,
            // log           : 3,
            preprocessData: function (data) {
                var i, l = data.length, array2 = [];
                if (l) {
                    
                    for (i = 0; i < l; i++) {
                        // alert(data[i].item_name + data[i].ItemCode + data[i].id + data[i].UnitofMeasure+data[i].UnitSalesPrice+data[i].VAT_Type)
                        // alert()
                        array2.push($.extend(true, data[i], {
                            text : data[i].registered_name,
                            value: data[i].registered_name,
                            buyer_id: data[i].company_id,
                            
                            data : {
                                subtext: "Buyer ID:"+ data[i].company_id,
                                buyer_id: data[i].company_id,
                                registered_name: data[i].registered_name,
                            }
                        }));
                        // alert(JSON.stringify(array2))
                    }
                }
                
                return array2;   
            }
        };

        $('.selectpicker').selectpicker().filter('.ajax-buyer').ajaxSelectPicker(select_buyer);
        $('select.ajax-buyer').trigger('change');
        $('#customer_id').change(function(){
             
            
            $('#buyer_id').val($(this).find(':selected').data('buyer_id'));
            $('#buyer_name').val($(this).find(':selected').data('registered_name'));
            
            
            
        });
    </script>

    {{-- Buyer Key Input Change --}}

    <script>
        $(document).ready(function(){
            $('#customer_id').selectpicker('hide');

            $('#buyer_name').show();
            $('#buyer_id').change(function(){
                $('#buyer_name').hide();
                $('.check-btn').removeClass('checked');
                $('#customer_id.selectpicker').val('');
                $('#customer_id').selectpicker('show');
                $('#customer_id').selectpicker('render');
            });
        });
    </script>

    {{-- Search Currency - Select picker --}}
    <script>
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            $('.selectpicker').selectpicker('mobile');
        }

        var path2 = "{{ route('currency.currencyList') }}";
        var select_currency = {
            // dropdownParent: $("#addItemModal"),
            ajax          : {
                url     :  path2,
                type    : 'get',
                dataType: 'json',
                data    : function() { // This is a function that is run on every request
                    return {
                        id:$(".ajax-currency input").val() //this is an input search parameter
                    };
                },
                success: function(data) {

                    //    alert(  JSON.stringify(data));
                
                    
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(xhr.responseText +status + error);
                }
                
            },
            locale        : {
                emptyTitle: 'Currency'
            },
            preserveSelected: false,
            clearOnEmpty: true,
            cache: false,
            emptyRequest: true,
            // log           : 3,
            preprocessData: function (data) {
                var i, l = data.length, array2 = [];
                if (l) {
                    
                    for (i = 0; i < l; i++) {
                        // alert(data[i].item_name + data[i].ItemCode + data[i].id + data[i].UnitofMeasure+data[i].UnitSalesPrice+data[i].VAT_Type)
                        // alert()
                        array2.push($.extend(true, data[i], {
                            text : data[i].code,
                            value: data[i].code,
                            currency_id: data[i].id,
                            ForCur: data[i].name,
                            Currency: data[i].code,
                            ConvRate: data[i].rate,
                            data : {
                                subtext: " | "+ data[i].name,
                                currency_id: data[i].id,
                                ForCur: data[i].name,
                                Currency: data[i].code,
                                ConvRate: data[i].rate,
                            }
                        }));
                        // alert(JSON.stringify(array2))
                    }
                }
                
                return array2;   
            }
        };

        $('.selectpicker').selectpicker().filter('.ajax-currency').ajaxSelectPicker(select_currency);
        $('select.ajax-currency').trigger('change');
        $('#currency_id').change(function(){
            
            $('#Currency').val($(this).find(':selected').data('currency'));
            $('#ForCur').val($(this).find(':selected').data('forcur'));
            $('#ConvRate').val($(this).find(':selected').data('convrate'));
            
            
            
        });
    </script>

    {{-- Compute Net Item Amount (after discount) --}}
    <script>
        $('#Qty').change(function(){ computeItemTotal(); });
        $('#UnitSalesPrice').change(function(){ computeItemTotal(); });
        $('#RegDscntAmt').change(function(){ computeItemTotal(); });
        $('#SpeDscntAmt').change(function(){ computeItemTotal(); });
        function computeItemTotal(){
            if ($('#Qty').val() =="" || $('#Qty').val()=="."){$('#Qty').val('0') }
            if ($('#UnitSalesPrice').val() =="" || $('#UnitSalesPrice').val()=="."){$('#UnitSalesPrice').val('0.00') }
            if ($('#RegDscntAmt').val() =="" || $('#RegDscntAmt').val()=="."){$('#RegDscntAmt').val('0.00') }
            if ($('#SpeDscntAmt').val() =="" || $('#SpeDscntAmt').val()=="."){$('#SpeDscntAmt').val('0.00') }
            
            var NUP = parseFloat($('#UnitSalesPrice').val()) - parseFloat($('#RegDscntAmt').val()) - parseFloat($('#SpeDscntAmt').val());
            $('#NetUnitPrice').val(NUP.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#NetAmount').val((NUP * parseFloat($('#Qty').val())).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            // actualNumber.toLocaleString('en-US', {maximumFractionDigits: 2})
            $('#Tax_Withheld').val("0.00");
            if(parseFloat($('#EWT_Rate').val())>0){
                net = NUP * parseFloat($('#Qty').val());
                ewt = parseFloat($('#EWT_Rate').val())/100;
                tax = net * ewt;
                // alert(net + ' e '+ ewt);
                $('#Tax_Withheld').val(tax.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
                
            }
        

        }
    </script>
    {{-- Compute Total --}}
    <script>
        
        
        $('#ScAmt').change(function(){  
            if ($('#ScAmt').val() =="" || $('#ScAmt').val()=="."){$('#ScAmt').val('0.00') }
            computeNetSummary(); 
        });
        $('#PwdAmt').change(function(){  
            if ($('#PwdAmt').val() =="" || $('#PwdAmt').val()=="."){$('#PwdAmt').val('0.00') }
            computeNetSummary();  
        });
        $('#RegAmt').change(function(){ 
            if ($('#RegAmt').val() =="" || $('#RegAmt').val()=="."){$('#RegAmt').val('0.00') }
            computeNetSummary(); 
        });
        $('#SpeAmt').change(function(){  
            if ($('#SpeAmt').val() =="" || $('#SpeAmt').val()=="."){$('#SpeAmt').val('0.00') }
            computeNetSummary();  
        });
        $('#OtherTaxRev').change(function(){  
            if ($('#OtherTaxRev').val() =="" || $('#OtherTaxRev').val()=="."){$('#OtherTaxRev').val('0.00') }
            computeNetSummary(); 
        });
        $('#WithholdIncome').change(function(){ 
            if ($('#WithholdIncome').val() =="" || $('#WithholdIncome').val()=="."){$('#WithholdIncome').val('0.00') }
            computeNetSummary(); 
        });
        
        $('#WithholdBusVAT').change(function(){ 
            if ($('#WithholdBusVAT').val() =="" || $('#WithholdBusVAT').val()=="."){$('#WithholdBusVAT').val('0.00') }
            computeNetSummary(); 
        });
        $('#WithholdBusPT').change(function(){ 
            if ($('#WithholdBusPT').val() =="" || $('#WithholdBusPT').val()=="."){$('#WithholdBusPT').val('0.00') }
            computeNetSummary(); 
        });
        $('#OtherNonTaxCharge').change(function(){ 
            if ($('#OtherNonTaxCharge').val() =="" || $('#OtherNonTaxCharge').val()=="."){$('#OtherNonTaxCharge').val('0.00') }
            computeNetSummary(); 
        });

        $('#ConvRate').change(function(){  
            if ($('#ConvRate').val() =="" || $('#ConvRate').val()=="."){$('#ConvRate').val('0') }
            computeNetSummary();  
        });
        
        function computeNetSummary(){
            var TotNetItemSales = 0;
            var NetAmtPay   = 0;
            var VATAmount  = 0;
            var VATableSales = 0;
            var TotNetSalesAftDisct = 0;
            var VATAmt = 0;
            var TotalDiscount=0;
            var TotalTax = 0;
            var NetSalesAfterTax = 0;
            var i, l = itemArrays.length;
            var Tax_Withheld =0;
            if (l) {
                for (i = 0; i < l; i++) {
                    
                    var data = itemArrays[i];
                    TotNetItemSales += parseFloat(data.NetAmount.replace(/,/g, ''));
                    if (data.VAT_Type != 'A2' && data.VAT_Type != 'A3'){
                        VATableSales += parseFloat(data.NetAmount.replace(/,/g, ''));
                    }
                    Tax_Withheld += parseFloat(data.Tax_Withheld.replace(/,/g, ''));
                    // alert(JSON.stringify(array2))
                }
            }
            TotalDiscount = parseFloat($('#ScAmt').val())  + parseFloat($('#PwdAmt').val()) + parseFloat($('#RegAmt').val()) + parseFloat($('#SpeAmt').val())
            
            $('#WithholdIncome').val(Tax_Withheld.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
                
            VATableSales = VATableSales + parseFloat($('#OtherTaxRev').val()) - TotalDiscount;
            TotNetSalesAftDisct = TotNetItemSales + parseFloat($('#OtherTaxRev').val()) - TotalDiscount;
            VATAmt = (VATableSales - (VATableSales / 1.12));
            VATableSales = (VATableSales / 1.12);
            TotalTax =  parseFloat($('#WithholdIncome').val().replace(/,/g, '')) + parseFloat($('#WithholdBusVAT').val()) + parseFloat($('#WithholdBusPT').val())
            NetSalesAfterTax = TotNetSalesAftDisct - TotalTax;
            NetAmtPay =  NetSalesAfterTax + parseFloat($('#OtherNonTaxCharge').val()) ;

            // alert(($('#ScAmt').val()));
            
        
            
            $('#VATableSales').val(VATableSales.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#VATAmt').val(VATAmt.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#TotNetItemSales').val(TotNetItemSales.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#TotNetSalesAftDisct').val(TotNetSalesAftDisct.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            // $('#NetSalesAfterTax').val(NetSalesAfterTax.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#NetAmtPay').val(NetAmtPay.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#ForexAmt').val('0.00');
            if (parseFloat($('#ConvRate').val()) > 0){
                $('#ForexAmt').val(NetAmtPay * parseFloat($('#ConvRate').val()) );
            }
        };
       
        
    </script>
    {{-- Initialized --}}
    <script>
         $(document).ready(function(){
            
            $('#VATableSales').val( $('#VATableSales').val().toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            VATableSales=parseFloat($('#VATableSales').val());
            alert(VATableSales.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#VATAmt').val($('#VATAmt').val().toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#TotNetItemSales').val($('#TotNetItemSales').val().toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#TotNetSalesAftDisct').val($('#TotNetSalesAftDisct').val().toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#NetAmtPay').val($('#NetAmtPay').val().toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#ForexAmt').val($('#ForexAmt').val().toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#ScAmt').val($('#ScAmt').val().toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#PwdAmt').val($('#PwdAmt').val().toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#RegAmt').val($('#RegAmt').val().toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#SpeAmt').val($('#SpeAmt').val().toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#WithholdIncome').val($('#WithholdIncome').val().toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#WithholdBusVAT').val($('#WithholdBusVAT').val().toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#WithholdBusPT').val($('#WithholdBusPT').val().toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#OtherTaxRev').val($('#OtherTaxRev').val().toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#OtherNonTaxCharge').val($('#OtherNonTaxCharge').val().toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
        

        });
    </script>
@endpush