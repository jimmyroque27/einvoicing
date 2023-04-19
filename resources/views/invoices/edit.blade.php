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
    .dataTable th{
        text-align: center !important;
        vertical-align: middle !important;
        font-size: 1.2em !important;
        font-weight: normal !important;
        
    }
     
    .dataTable{
        font-size: .75em !important;
        
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
                
                            
                <div class="col-sm-2  mb-sm-0 input_currency ">
                 
                    <label for="currency_id"   class="m-0 p-0"  >
                        <span class="h6 small ">Currency:  </span> 
                    </label>
                    
                    {!! Form::text('Currency', null, array('placeholder' => '','class' => 'form-control m-0  p-1  ','autocomplete'=>'off', 'id'=>'Currency')) !!}
                    {!! Form::hidden('ForCur', null, array('placeholder' => '','class' => 'form-control m-0  p-1  ','autocomplete'=>'off', 'id'=>'ForCur')) !!}
                    @error('Currency')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
               

                <div class="col-md-2 pr-3 p-0 select_currency">
                    
                    
                    <label for="currency_id"   class="m-0 p-0"  >
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
            <div class="form-group row m-0 mt-2 mb-4 p-1">
                 
                {{ $dataTable->table(['class' => 'table table-bordered table-stripe'] ) }}
             
                <button type="button" class="btn btn-primary m-0 mt-2  rounded-0 " data-toggle="modal" data-target="#addItemModal">
                    <span class="small"><i class='fas fa-fw fa-plus'></i> Add Item</span>
                </button>
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
                    <button type="submit" class="btn btn-primary">Save Invoice</button>
                </div>
            </div>
            {!! Form::close() !!}


             <!-- Add Invoice Item Modal -->
             <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalTitle" aria-hidden="true">
                <div class="modal-dialog "   role="document">
                    <div class="modal-content rounded-0" style="width: 650px !important">
                        <div class="modal-header rounded-0 bg-warning m-0 p-2">
                            <h6 class="modal-title text-white" id="addItemModalTitle">Add Line Item</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        {!! Form::open(array('route' => ['invoices.store_item', $invoice->id],'method'=>'POST')) !!}
                           
                        <div class="modal-body  m-2">
                            
                            {{-- Item Code --}}
                            <div class="form-group row m-0 p-1">
                                <div class="col-md-3  m-0 p-0"   > 
                                        <label for="ItemCode"   class="m-0 p-0"  >
                                        <span class="h6 small ">Item No.:  </span> 
                                    </label>
                                </div>
                                <div class="col-md-3  m-0 p-0"   >
                                    {!! Form::text('ItemCode', old('ItemCode')?old('ItemCode'):null, array('placeholder' => '','class' => 'form-control m-0  p-1  ','autocomplete'=>'off','id'=>'ItemCode','required' )) !!}
                                    @error('ItemCode')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-1 m-0 p-0 " >
                                    <a href="#" id="getItem" class="btn btn-dark rounded-0 m-0 p-0 check-btn-item  ">
                                        <i class="fas fa-fw fa-check"></i>
                                    </a>
                                </div>
                                    
                            </div>
                            {{-- Item Description --}}
                            <div class="form-group row m-0 p-1">
                                <div class="col-md-3  m-0 p-0"   > 
                                    <label for="item_name"   class="m-0 p-0"  >
                                    <span class="h6 small ">Item Name:  </span> 
                                    </label>
                                </div>
                                <div class="col-md-9  m-0 p-0"   >
                                    {!! Form::text('item_name', old('item_name')?old('item_name'):null, array('placeholder' => '','class' => 'form-control m-0  p-1  ','autocomplete'=>'off','readonly','id'=>'item_name','required' )) !!}
                                    <select  id="product_id"  name="product_id"    class="selectpicker ajax-product w-100" data-live-search="true"></select>
                                    
                                    @error('item_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Quantity --}}
                            <div class="form-group row m-0 p-1">
                                <div class="col-md-3  m-0 p-0"   > 
                                    <label for="Qty"   class="m-0 p-0"  >
                                    <span class="h6 small ">Quantity:</span> 
                                    </label>
                                </div>
                                <div class="col-md-3  m-0 p-0"   >
                                    {!! Form::text('Qty', old('Qty')?old('Qty'):0, array('placeholder' => '','class' => 'form-control m-0  p-1 floatNumber ','autocomplete'=>'off','id'=>'Qty','required' )) !!}
                                    @error('Qty')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                {{-- Unit of Measure --}}
                                    
                                <div class="col-md-3  m-0 p-0"   >
                                    {!! Form::text('UnitofMeasure', old('UnitofMeasure')?old('UnitofMeasure'):null, array('placeholder' => '','class' => 'form-control m-0  p-1 border-0  ','autocomplete'=>'off','id'=>'UnitofMeasure' )) !!}
                                    @error('UnitofMeasure')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Unit Price --}}
                            <div class="form-group row m-0 p-1">
                                <div class="col-md-3  m-0 p-0"   > 
                                    <label for="UnitSalesPrice"   class="m-0 p-0"  >
                                    <span class="h6 small ">Unit Price:</span> 
                                    </label>
                                </div>
                                <div class="col-md-3  m-0 p-0"   >
                                    {!! Form::text('UnitSalesPrice', old('UnitSalesPrice')?old('UnitSalesPrice'):0.00, array('placeholder' => '','class' => 'form-control m-0  p-1 floatNumber ','autocomplete'=>'off','id'=>'UnitSalesPrice' )) !!}
                                    @error('UnitSalesPrice')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <div class="col-md-6  m-0 p-0 pl-1"   > 
                                    
                                    {{-- Regular Discount --}}
                                    <div class="form-group row m-0 p-0 pt-1 pb-1">
                                        <div class="col-md-6  m-0 p-0"   > 
                                            <label for="RegDscntAmt"   class="m-0 p-0"  >
                                            <span class="h6 small ">Regular Discount:</span> 
                                            </label>
                                        </div>
                                        <div class="col-md-6  m-0 p-0"   >
                                            {!! Form::text('RegDscntAmt', old('RegDscntAmt')?old('RegDscntAmt'):0.00, array('placeholder' => '','class' => 'form-control m-0  p-1 floatNumber ','autocomplete'=>'off','id'=>'RegDscntAmt' )) !!}
                                            @error('RegDscntAmt')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Special Discount --}}
                                    <div class="form-group row m-0 p-0 pt-1 pb-1">
                                        <div class="col-md-6  m-0 p-0"   > 
                                            <label for="SpeDscntAmt"   class="m-0 p-0"  >
                                            <span class="h6 small ">Special Discount:</span> 
                                            </label>
                                        </div>
                                        <div class="col-md-6  m-0 p-0"   >
                                            {!! Form::text('SpeDscntAmt', old('SpeDscntAmt')?old('SpeDscntAmt'):0.00, array('placeholder' => '','class' => 'form-control m-0  p-1 floatNumber ','autocomplete'=>'off','id'=>'SpeDscntAmt' )) !!}
                                            @error('SpeDscntAmt')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Net Unit Price --}}
                                    <div class="form-group row m-0 p-0 pt-1 pb-1">
                                        <div class="col-md-6  m-0 p-0"   > 
                                            <label for="NetUnitPrice"   class="m-0 p-0"  >
                                            <span class="h6 small ">Net Unit Price:</span> 
                                            </label>
                                        </div>
                                        <div class="col-md-6  m-0 p-0"   >
                                            {!! Form::text('NetUnitPrice', old('NetUnitPrice')?old('NetUnitPrice'):0.00, array('placeholder' => '','class' => 'form-control m-0  p-1 floatNumber ','autocomplete'=>'off','readonly', 'id'=>'NetUnitPrice' )) !!}
                                            @error('NetUnitPrice')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Net Amount --}}
                                    <div class="form-group row m-0 p-0 pt-1 pb-1">
                                        <div class="col-md-6  m-0 p-0"   > 
                                            <label for="NetAmount"   class="m-0 p-0"  >
                                            <span class="h6 small ">Net Amount:</span> 
                                            </label>
                                        </div>
                                        <div class="col-md-6  m-0 p-0"   >
                                            {!! Form::text('NetAmount', old('NetAmount')?old('NetAmount'):0.00, array('placeholder' => '','class' => 'form-control m-0  p-1 floatNumber ','autocomplete'=>'off','readonly', 'id'=>'NetAmount' )) !!}
                                            @error('NetAmount')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6  m-0 p-0 pl-1"   > 
                                    {{-- VAT Type --}}
                                    <div class="form-group row m-0 p-0 pt-1 pb-1">
                                        <div class="col-md-6  m-0 p-0"   > 
                                            <label for="VAT_Type"   class="m-0 p-0"  >
                                            <span class="h6 small ">VAT Type:</span> 
                                            </label>
                                        </div>
                                        <div class="col-md-6  m-0 p-0"   >
                                            {!! Form::text('VAT_Type', old('VAT_Type')?old('VAT_Type'):null, array('placeholder' => '','class' => 'form-control m-0  p-1  ','autocomplete'=>'off','id'=>'VAT_Type','readonly' )) !!}
                                            @error('VAT_Type')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- ATC --}}
                                    <div class="form-group row m-0 p-0 pt-1 pb-1">
                                        <div class="col-md-6  m-0 p-0"   > 
                                            <label for="VAT_Type"   class="m-0 p-0"  >
                                            <span class="h6 small ">ATC:</span> 
                                            </label>
                                        </div>
                                        <div class="col-md-6  m-0 p-0"   >
                                            {!! Form::text('ATC', old('ATC')?old('ATC'):null, array('placeholder' => '','class' => 'form-control m-0  p-1  ','autocomplete'=>'off','id'=>'ATC','readonly' )) !!}
                                            @error('ATC')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- EWT_Rate --}}
                                    <div class="form-group row m-0 p-0 pt-1 pb-1">
                                        <div class="col-md-6  m-0 p-0"   > 
                                            <label for="EWT_Rate"   class="m-0 p-0"  >
                                            <span class="h6 small ">EWT Rate:</span> 
                                            </label>
                                        </div>
                                        <div class="col-md-6  m-0 p-0"   >
                                            {!! Form::text('EWT_Rate', old('EWT_Rate')?old('EWT_Rate'):0.00, array('placeholder' => '','class' => 'form-control m-0  p-1 floatNumber ','autocomplete'=>'off','readonly', 'id'=>'EWT_Rate' )) !!}
                                            @error('EWT_Rate')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Tax Withhelld --}}
                                    <div class="form-group row m-0 p-0 pt-1 pb-1">
                                        <div class="col-md-6  m-0 p-0"   > 
                                            <label for="Tax_Withheld"   class="m-0 p-0"  >
                                            <span class="h6 small ">Tax Withhelld:</span> 
                                            </label>
                                        </div>
                                        <div class="col-md-6  m-0 p-0"   >
                                            {!! Form::text('Tax_Withheld', old('Tax_Withheld')?old('Tax_Withheld'):0.00, array('placeholder' => '','class' => 'form-control m-0  p-1 floatNumber ','autocomplete'=>'off','readonly', 'id'=>'Tax_Withheld' )) !!}
                                            @error('Tax_Withheld')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                                
                            
                          


                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            <button type="submit" class="btn btn-success btn-save-item">Save Invoice Item</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
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
            
            if ($('#ConvRate').val() =="" || $('#ConvRate').val()=="."){$('#ConvRate').val('0.00') }
            computeCurrency(); 
            
        });
        $('.select_currency').hide(); 
        $('#Currency').focus(function(){
            $('.input_currency').hide(); 
            $('.select_currency').show(); 
            
             
        });
    </script>
 

    {{-- Check Item ID --}}
    <script>
        $('#item_name').hide();
        $('#product_id').selectpicker('show');
            
        $("#getItem").click(function(){
        
            $('.check-btn-item').removeClass('checked');
            if($("#ItemCode").val()!=""){
                var getTP_url = "/products/getItemRow/"+$("#ItemCode").val() ;
                
                $.ajax({url: getTP_url ,                  
                    success: function(data) {
                        if ($.trim(data)){
                            $('.check-btn-item').addClass('checked');
                            $("#item_name").val(data[0]['item_name']);
                            $("#product_id").val(data[0]['ItemCode']);
                            $("#VAT_Type").val(data[0]['VAT_Type']);
                            $('.selectpicker').val(data[0]['ItemCode']);
                            $('#product_id').selectpicker('render');
                            $("#UnitofMeasure").val(data[0]['UnitofMeasure']);
                            $("#UnitSalesPrice").val(data[0]['UnitSalesPrice']);
                            $("#ATC").val(data[0]['ATC']);
                            $("#EWT_Rate").val(data[0]['EWT_Rate']);
                             
                            $('#product_id').selectpicker('hide');
                            $('#item_name').show();
                            // alert("aaadfdsdafsdfass")
                        }else{
                            Swal.fire( 'Item No. Not Found!')  
                            clearItemEntry(); 
                        } 
                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        Swal.fire( 'Error processing!') 
                        clearItemEntry();
                    }
                });
            } 
        
        });
    </script>

    {{-- Search Item - Select picker --}}
    <script>
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            $('.selectpicker').selectpicker('mobile');
        }

        var path2 = "{{ route('itemslist') }}";
        var select_product = {
            // dropdownParent: $("#addItemModal"),
            ajax          : {
                url     :  path2,
                type    : 'get',
                dataType: 'json',
                data    : function() { // This is a function that is run on every request
                    return {
                        id:$(".ajax-product input").val() //this is an input search parameter
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
                emptyTitle: 'Select Item'
            },
            preserveSelected: false,
            clearOnEmpty: true,
            cache: false,
            emptyRequest: true,
            // log           : 3,
            preprocessData: function (data) {
                var i, l = data.length, array2 = [];
                if (l) {
                    // alert(JSON.stringify(data))
                    for (i = 0; i < l; i++) {
                        // alert(data[i].item_name + data[i].ItemCode + data[i].id + data[i].UnitofMeasure+data[i].UnitSalesPrice+data[i].VAT_Type)
                        // alert()
                        array2.push($.extend(true, data[i], {
                            text : data[i].item_name,
                            value: data[i].item_name,
                            ItemCode: data[i].ItemCode,
                            item_name: data[i].item_name,
                            UnitofMeasure: data[i].UnitofMeasure,
                            UnitSalesPrice: data[i].UnitSalesPrice,
                            VAT_Type: data[i].VAT_Type,
                            ATC: data[i].ATC,
                            EWT_Rate: data[i].EWT_Rate,
                             
                            
                            data : {
                                subtext: "Item No.:"+ data[i].ItemCode,
                                ItemCode: data[i].ItemCode,
                                item_name: data[i].item_name,
                                UnitofMeasure: data[i].UnitofMeasure,
                                UnitSalesPrice: data[i].UnitSalesPrice,
                                VAT_Type: data[i].VAT_Type,
                                ATC: data[i].ATC,
                                EWT_Rate: data[i].EWT_Rate,
                                 
                            }
                        }));
                        // alert(JSON.stringify(array2))
                    }
                }
                
                return array2;   
            }
        };

        $('.selectpicker').selectpicker().filter('.ajax-product').ajaxSelectPicker(select_product);
        $('select.ajax-product').trigger('change');
        $('#product_id').change(function(){
            // alert("dsfsdf")
            //alert($(this).find(':selected').data('onhand'));
            $('#VAT_Type').val($(this).find(':selected').data('vat_type'));
            $('#ATC').val($(this).find(':selected').data('atc'));
            $('#EWT_Rate').val($(this).find(':selected').data('ewt_rate'));
             
            $('#UnitofMeasure').val($(this).find(':selected').data('unitofmeasure'));
            $('#UnitSalesPrice').val($(this).find(':selected').data('unitsalesprice'));
            $('#ItemCode').val($(this).find(':selected').data('itemcode'));
            $('#item_name').val($(this).find(':selected').data('item_name'));
            computeItemTotal();
            //   getTotal();
            
            var dataname = $("option[value=" + $(this).val() + "]", this).attr('data-itemcode');
            // alert(dataname);
            
        });
    </script>

    {{-- Clear New Item Line --}}
    <script>
        function clearItemEntry(){
        
            $('#item_name').hide();
            $('.check-btn-item').removeClass('checked');
            $('#product_id.selectpicker').val('');
            $('#product_id').selectpicker('show');
            $('#product_id').selectpicker('render');
            $('#item_name').val('');
            $('#ItemCode').val('');
            $('#Qty').val('0');
            $('#UnitofMeasure').val('');
            $('#VAT_Type').val('');
            $('#ATC').val('');
            $('#EWT_Rate').val('0.00');
            $('#Tax_Withheld').val('0.00');
            $('#UnitSalesPrice').val('0.00');
            $('#RegDscntAmt').val('0.00');
            $('#SpeDscntAmt').val('0.00');
            $('#NetUnitPrice').val('0.00')
            $('#NetAmount').val('0.00')
        }
    </script>
    {{-- Item Key Input Change --}}
    <script>
        $(document).ready(function(){
            $('#ItemCode').change(function(){
                itemval = $('#ItemCode').val();
                clearItemEntry();
                $('#ItemCode').val(itemval);
                
            });
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
         
        $('#ConvRate').change(function(){  
            if ($('#ConvRate').val() =="" || $('#ConvRate').val()=="."){$('#ConvRate').val('0.00') }
            computeCurrency();
        });
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

         
        
        function computeNetSummary(){
            var TotNetItemSales = $('#TotNetItemSales').val().replace(/,/g, '');
            var VATableSales = $('#VATableSales').val().replace(/,/g, '');
            var NetAmtPay = $('#NetAmtPay').val().replace(/,/g, '');
            var VATAmt = $('#VATAmt').val().replace(/,/g, '');
            
            var WithholdIncome = $('#WithholdIncome').val().replace(/,/g, '');
            var WithholdBusVAT = $('#WithholdBusVAT').val().replace(/,/g, '');
            var WithholdBusPT = $('#WithholdBusPT').val().replace(/,/g, '');
            var TotNetSalesAftDisct = $('#TotNetSalesAftDisct').val().replace(/,/g, '');
            var ScAmt = $('#ScAmt').val().replace(/,/g, '');
            var PwdAmt = $('#PwdAmt').val().replace(/,/g, '');
            var RegAmt = $('#RegAmt').val().replace(/,/g, '');
            var SpeAmt = $('#SpeAmt').val().replace(/,/g, '');
            
            var OtherTaxRev = $('#OtherTaxRev').val().replace(/,/g, '');
            var OtherNonTaxCharge = $('#OtherNonTaxCharge').val().replace(/,/g, '');
            var TotalDiscount = parseFloat(SpeAmt)  + parseFloat(RegAmt) + parseFloat(PwdAmt) + parseFloat(ScAmt)
            var TotNetSalesAftDisct = TotNetItemSales - TotalDiscount;
            var NetSalesAfterTax = TotNetSalesAftDisct - WithholdIncome - WithholdBusVAT -WithholdBusPT;
            NetAmtPay =  NetSalesAfterTax + parseFloat(OtherNonTaxCharge)+ parseFloat(OtherTaxRev) ;

            // alert(($('#ScAmt').val()));
            
        
            
            $('#VATableSales').val(numericFormat(VATableSales,2,2));
            $('#VATAmt').val(numericFormat(VATAmt,2,2));
            $('#TotNetSalesAftDisct').val(numericFormat(TotNetSalesAftDisct,2,2));
            $('#NetAmtPay').val(numericFormat(NetAmtPay,2,2));
             
            computeCurrency()
        };
        function computeCurrency(){
            $('#ForexAmt').val('0.00');
            if (parseFloat($('#ConvRate').val()) > 0){
                $('#ForexAmt').val(numericFormat($('#NetAmtPay').val().replace(/,/g, '') / parseFloat($('#ConvRate').val()),2,2) );
            }
        }
        
    </script>
    {{-- Initialized --}}
    <script>
         $(document).ready(function(){
            
            $('#VATableSales').val(numericFormat($('#VATableSales').val(),2,2));
            $('#VATAmt').val(numericFormat($('#VATAmt').val(),2,2));
            $('#TotNetItemSales').val(numericFormat($('#TotNetItemSales').val(),2,2));
            $('#TotNetSalesAftDisct').val(numericFormat($('#TotNetSalesAftDisct').val(),2,2));
            $('#NetAmtPay').val(numericFormat($('#NetAmtPay').val(),2,2));
            $('#ForexAmt').val(numericFormat($('#ForexAmt').val(),2,2));
            $('#ScAmt').val(numericFormat($('#ScAmt').val(),2,2));
            $('#PwdAmt').val(numericFormat($('#PwdAmt').val(),2,2));
            $('#RegAmt').val(numericFormat($('#RegAmt').val(),2,2));
            $('#SpeAmt').val(numericFormat($('#SpeAmt').val(),2,2));
            $('#WithholdIncome').val(numericFormat($('#WithholdIncome').val(),2,2));
            $('#WithholdBusVAT').val(numericFormat($('#WithholdBusVAT').val(),2,2));
            $('#WithholdBusPT').val(numericFormat($('#WithholdBusPT').val(),2,2));
            $('#OtherTaxRev').val(numericFormat($('#OtherTaxRev').val(),2,2));
            $('#OtherNonTaxCharge').val(numericFormat($('#OtherNonTaxCharge').val(),2,2));
            
        });
    </script>
@endpush