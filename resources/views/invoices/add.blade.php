@extends('layouts.master')



 


@section('content')
{{-- <link rel="stylesheet" href="{{ asset('select2/css/select2.min.css')}}"/> --}}
{{-- <link rel="stylesheet" href="{{ asset('bootstrap-select/css/bootstrap.min.css')}}"> --}}
   
   
<style>
    .select2-container 
    {
        width: 100% !important;
        font-size: .9rem !important;
        
    }
    .select2-selection
    {
        padding:3px !important;
        height: calc(1.5em + 0.75rem + 2px) !important;
        border: 1px solid #d1d3e2 !important;
    }
    select, input{
        font-size: .9rem !important;
    }
    table{
        width: 100% !important;
    }
    input.form-control, select.form-control{
            padding: 2px !important;
            /* margin: 2px 2px 2px 2px !important; */
            font-size: .9rem !important;
            height: 28px !important;
            border-radius: 0px !important;
    }
    label >span{
        font-weight: bold !important;
        padding-left: 2px !important;
    }
    th{
        text-align: center !important;
        vertical-align: middle !important;
        font-size: .8rem !important;
        font-weight: normal !important;
        padding: 2px !important;
    }
    .check-btn, .check-btn-item{
        height: 28px;
    }
    .check-btn:hover, .check-btn-item:hover{
        color: yellow;
    }
    .check-btn.checked, .check-btn-item.checked{
        color: rgb(11, 204, 5);
    }
    .dropdown-item{
        padding-left: 5px !important;
    }
    .dropdown-item.selected.active{
        background-color: #121f46 !important;
    }
    .bootstrap-select >.btn{
        border: 1px solid #dae4e7 !important;
        height: 30px !important;
        border-radius: 0px !important;
        padding: 3px !important;
        font-size: .9rem !important;
        background-color: #fff !important;
    }
    label>span{
        font-size: .9em !important;
        font-weight: normal !important;
        color: rgb(12, 33, 94);
    }
</style>
<div class="container-fluid m-0 p-0">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Profile</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> -->

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- Form Registration -->
    <div class="card shadow mb-4 m-0 p-0  rounded-0">
        <div class="card-header  bg-light rounded-0">
            <h6 class="m-1 font-weight-bold text-secondary">Invoice Transaction</h6>
        </div>
        <div class="card-body  ml-0 p-2 pl-1">
            <form method="POST" action="{{route('invoices.store')}}">
                @csrf
                <input type='hidden' name ="items" id="items">
                {{-- <input type="hidden" id="SellerId" name="seller_id" value ="{{Auth::user()->seller_id}}"   /> --}}
                {{-- SI/OR/SB/DM/CM/CN/DN Management Information --}}
                <div class="form-group row m-0 p-0">
                    {{-- Customer Order Information --}}
                    <div class="col-md-2 p-0 pr-1">
                        <div class="row m-0 p-0">
                            <div class="col-md-10  m-0 p-0"   >
                                <label for="buyer_id"  class="m-0 p-0" >
                                    <span class="h6 small ">Customer No.: </span> 
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control  m-0  p-1   form-control-user @error('buyer_id') is-invalid @enderror" 
                                    id="buyer_id"
                                    placeholder=""  
                                    name="buyer_id" 
                                    value="{{ old('buyer_id') }}">
                                    

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
                        <input 
                            type="text"  readonly
                            class="form-control  m-0  p-1   form-control-user @error('buyer_name') is-invalid @enderror" 
                            id="buyer_name"
                            placeholder=""  
                            name="buyer_name" 
                            value="{{ old('buyer_name') }}">

                         
                        <select  id="customer_id"  name="customer_name"   class="selectpicker ajax-buyer w-100" data-live-search="true"></select>
                         

                        @error('buyer_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-2 p-0 pr-1">
                        <label for="InvoiceNumber" class="m-0 p-0"  >
                            <span class="h6 small ">Invoice No.: </span> 
                        </label>
                        <input 
                            type="text" readonly
                            class="form-control  m-0  p-1   form-control-user @error('InvoiceNumber') is-invalid @enderror" 
                            id="InvoiceNumber"
                            placeholder="auto generate"  
                            name="InvoiceNumber" 
                            value="{{ old('InvoiceNumber') }}">

                        @error('InvoiceNumber')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="col-md-2  p-0 pr-1">
                        <label for="InvoiceDate" class="m-0 p-0"  >
                            <span class="h6 small ">Issued Date: </span> 
                        </label>
                        <input 
                            type="date" 
                            class="form-control  m-0  p-1   w-75 form-control-user @error('OrderDate') is-invalid @enderror" 
                            id="InvoiceDate"
                            placeholder=""  
                            name="InvoiceDate" 
                            value="{{ date('Y-m-d') }}">

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
                        <input 
                            type="text" 
                            class="form-control  m-0  p-1   form-control-user @error('OrderNumber') is-invalid @enderror" 
                            id="OrderNumber"
                            placeholder=""  
                            name="OrderNumber" 
                            value="{{ old('OrderNumber') }}">

                        @error('OrderNumber')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-3  p-0 mr-0">
                        <label for="OrderDate" class="m-0 p-0" >
                            <span class="h6 small ">Order Date: </span> 
                        </label>
                        <input 
                            type="date" 
                            class="form-control  m-0  p-1   w-50 form-control-user @error('OrderDate') is-invalid @enderror" 
                            id="OrderDate"
                            placeholder=""  
                            name="OrderDate" 
                            value="{{ old('OrderDate') }}">

                        @error('OrderDate')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                                
                    <div class="col-md-2 pr-3 p-0">
                        <input 
                            type="hidden" 
                            class="form-control  m-0  p-1   form-control-user @error('Currency') is-invalid @enderror" 
                            id="Currency"
                            placeholder=""  
                            name="Currency" 
                            value="{{ old('Currency') }}">
                        <input 
                            type="hidden" 
                            class="form-control  m-0  p-1   form-control-user @error('ForCur') is-invalid @enderror" 
                            id="ForCur"
                            placeholder=""  
                            name="ForCur" 
                            value="{{ old('ForCur') }}">

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
                        <input 
                            type="text" 
                            class="form-control  m-0  p-1 floatNumber  form-control-user @error('ConvRate') is-invalid @enderror" 
                            id="ConvRate"
                            placeholder=""  
                            name="ConvRate" 
                            value="{{ old('ConvRate')?old('ConvRate'):0 }}">

                        @error('ConvRate')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                        
                    </div>
                    <div class="col-md-2 p-0 pr-1">
                        <label for="ForexAmt" class="m-0 p-0"  >
                            <span class="h6 small ">Converted Amount </span> 
                        </label>
                        <input 
                            type="text" readonly
                            class="form-control  m-0  p-1 floatNumber  form-control-user @error('ForexAmt') is-invalid @enderror" 
                            id="ForexAmt"
                            placeholder=""  
                            name="ForexAmt" 
                            value="{{ old('ForexAmt')?old('ForexAmt'):0 }}">

                        @error('ForexAmt')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                        
                    </div>
                    
                </div>
                <!-- Divider -->
                <hr class="sidebar-divider mt-2 p-0 ">

                
                {{-- Item Management Information --}}
                <div class="form-group row m-0 p-0">
                    <div class="table-responsive mb-3">
                        <table class="table table-bordered text-dark " id="dataTable" width="100%" cellspacing="0">
                            
                             
                        </table>
                    </div>
                    <button type="button" class="btn btn-primary m-0 p-1 pt-0 " data-toggle="modal" data-target="#addItemModal">
                        <span class="small"><i class='fas fa-fw fa-plus'></i> Add Item</span>
                    </button>
                    <button type="button" class="btn btn-danger m-0 ml-2 p-1 pt-0 " id="item_button"><i class='fas fa-fw fa-trash'></i> Item</button>
                 
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
                                    
                                    <input 
                                        type="text" 
                                        class="form-control  m-0  p-1  floatNumber form-control-user @error('ScAmt') is-invalid @enderror" 
                                        id="ScAmt"
                                        placeholder=""  
                                        name="ScAmt" 
                                        value="0.00">
                                </td>
                            </tr>
                            <tr>
                                <td class="m-0 p-0 border-0">
                                    <label for="VATableSales"  class="m-0 p-1" >
                                        <span class="h6 small ">PWD Discount</span> 
                                    </label>
                                </td>
                                <td class="m-0 p-0 border-0">
                                    
                                    <input 
                                        type="text" 
                                        class="form-control  m-0  p-1  floatNumber form-control-user @error('PwdAmt') is-invalid @enderror" 
                                        id="PwdAmt"
                                        placeholder=""  
                                        name="PwdAmt" 
                                        value="0.00">
                                </td>
                            </tr>
                            <tr>
                                <td class="m-0 p-0 border-0">
                                    <label for="RegAmt"  class="m-0 p-1" >
                                        <span class="h6 small ">Regular Discount </span> 
                                    </label>
                                </td>
                                <td class="m-0 p-0 border-0">
                                    
                                    <input 
                                        type="text" 
                                        class="form-control  m-0  p-1  floatNumber form-control-user @error('RegAmt') is-invalid @enderror" 
                                        id="RegAmt"
                                        placeholder=""  
                                        name="RegAmt" 
                                        value="0.00">
                                </td>
                            </tr>
                            <tr>
                                <td class="m-0 p-0 border-0">
                                    <label for="SpeAmt"  class="m-0 p-1" >
                                        <span class="h6 small ">Special Discount </span> 
                                    </label>
                                </td>
                                <td class="m-0 p-0 border-0">
                                    
                                    <input 
                                        type="text" 
                                        class="form-control  m-0  p-1  floatNumber form-control-user @error('SpeAmt') is-invalid @enderror" 
                                        id="SpeAmt"
                                        placeholder=""  
                                        name="SpeAmt" 
                                        value="0.00">
                                </td>
                            </tr>
                            <tr>
                                <td class="m-0 p-0 border-0">
                                    <label for="Rmk2"  class="m-0 p-1" >
                                        <span class="h6 small ">Remarks </span> 
                                    </label>
                                </td>
                                <td class="m-0 p-0 border-0">
                                    
                                    <input 
                                        type="text" 
                                        class="form-control  m-0  p-1   form-control-user @error('Rmk2') is-invalid @enderror" 
                                        id="Rmk2"
                                        placeholder=""  
                                        name="Rmk2" 
                                        value="{{ old('Rmk2') }}">
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
                                    
                                    <input 
                                        type="text" readonly
                                        class="form-control  m-0  p-1  floatNumber form-control-user @error('VATableSales') is-invalid @enderror" 
                                        id="VATableSales"
                                        placeholder=""  
                                        name="VATableSales" 
                                        value="0.00">
                                </td>
                            </tr>
                            <tr>
                                <td class="m-0 p-0 border-0">
                                    <label for="VATAmt"  class="m-0 p-1" >
                                        <span class="h6 small ">VAT Amount</span> 
                                    </label>
                                </td>
                                <td class="m-0 p-0 border-0">
                                    
                                    <input 
                                        type="text" readonly
                                        class="form-control  m-0  p-1 floatNumber  form-control-user @error('VATAmt') is-invalid @enderror" 
                                        id="VATAmt"
                                        placeholder=""  
                                        name="VATAmt" 
                                        value="0.00">
                                </td>
                            </tr>
                            <tr>
                                <td class="m-0 p-0 border-0">
                                    <label for="WithholdIncome"  class="m-0 p-1" >
                                        <span class="h6 small ">Withholding Tax - Income Tax</span> 
                                    </label>
                                </td>
                                <td class="m-0 p-0 border-0">
                                    
                                    <input 
                                        type="text" 
                                        class="form-control  m-0  p-1  floatNumber form-control-user @error('WithholdIncome') is-invalid @enderror" 
                                        id="WithholdIncome"
                                        placeholder=""  
                                        name="WithholdIncome" 
                                        value="0.00">
                                </td>
                            </tr>
                            <tr>
                                <td class="m-0 p-0 border-0">
                                    <label for="WithholdBusVAT"  class="m-0 p-1" >
                                        <span class="h6 small ">Withholding Tax-Business VAT</span> 
                                    </label>
                                </td>
                                <td class="m-0 p-0 border-0">
                                    
                                    <input 
                                        type="text" 
                                        class="form-control  m-0  p-1  floatNumber form-control-user @error('WithholdBusVAT') is-invalid @enderror" 
                                        id="WithholdBusVAT"
                                        placeholder=""  
                                        name="WithholdBusVAT" 
                                        value="0.00">
                                </td>
                            </tr>
                            <tr>
                                <td class="m-0 p-0 border-0">
                                    <label for="WithholdBusPT"  class="m-0 p-1" >
                                        <span class="h6 small ">Withholding Tax - Business %</span> 
                                    </label>
                                </td>
                                <td class="m-0 p-0 border-0">
                                    
                                    <input 
                                        type="text" 
                                        class="form-control  m-0  p-1 floatNumber  form-control-user @error('WithholdBusPT') is-invalid @enderror" 
                                        id="WithholdBusPT"
                                        placeholder=""  
                                        name="WithholdBusPT" 
                                        value="0.00">
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
                                    
                                    <input 
                                        type="text" readonly
                                        class="form-control  m-0  p-1  floatNumber form-control-user @error('TotNetItemSales') is-invalid @enderror" 
                                        id="TotNetItemSales"
                                        placeholder=""  
                                        name="TotNetItemSales" 
                                        value="0.00">
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td class="m-0 p-0 border-0 w-50">
                                    <label for="TotNetSalesAftDisct"  class="m-0 p-1" >
                                        <span class="h6 small ">Net Sales After Discount </span> 
                                    </label>
                                </td>
                                <td class="m-0 p-0 border-0">
                                    
                                    <input 
                                        type="text" readonly
                                        class="form-control  m-0  p-1 floatNumber  form-control-user @error('TotNetSalesAftDisct') is-invalid @enderror" 
                                        id="TotNetSalesAftDisct"
                                        placeholder=""  
                                        name="TotNetSalesAftDisct" 
                                        value="0.00">
                                </td>
                            </tr>
                            {{-- <tr>
                                <td class="m-0 p-0 border-0 w-50">
                                    <label for="NetSalesAfterTax"  class="m-0 p-1" >
                                        <span class="h6 small ">Net Sales After Tax </span> 
                                    </label>
                                </td>
                                <td class="m-0 p-0 border-0">
                                    
                                    <input 
                                        type="text" readonly
                                        class="form-control  m-0  p-1  floatNumber form-control-user @error('NetSalesAfterTax') is-invalid @enderror" 
                                        id="NetSalesAfterTax"
                                        placeholder=""  
                                        name="NetSalesAfterTax" 
                                        value="0.00">
                                </td>
                            </tr> --}}
                            <tr>
                                <td class="m-0 p-0 border-0 w-50">
                                    <label for="OtherTaxRev"  class="m-0 p-1" >
                                        <span class="h6 small ">Other Taxable Revenue</span> 
                                    </label>
                                </td>
                                <td class="m-0 p-0 border-0">
                                    
                                    <input 
                                        type="text" 
                                        class="form-control  m-0  p-1 floatNumber  form-control-user @error('OtherTaxRev') is-invalid @enderror" 
                                        id="OtherTaxRev"
                                        placeholder=""  
                                        name="OtherTaxRev" 
                                        value="0.00">
                                </td>
                            </tr>
                            <tr>
                                <td class="m-0 p-0 border-0 w-50">
                                    <label for="OtherNonTaxCharge"  class="m-0 p-1" >
                                        <span class="h6 small ">Other Non-taxable charges</span> 
                                    </label>
                                </td>
                                <td class="m-0 p-0 border-0">
                                    
                                    <input 
                                        type="text" 
                                        class="form-control  m-0  p-1  floatNumber form-control-user @error('OtherNonTaxCharge') is-invalid @enderror" 
                                        id="OtherNonTaxCharge"
                                        placeholder=""  
                                        name="OtherNonTaxCharge" 
                                        value="0.00">
                                </td>
                            </tr>
                            <tr>
                                <td class="m-0 p-0 border-0 w-50">
                                    <label for="NetAmtPay"  class="m-0 p-1" >
                                        <span class="h6 small text-primary">Net Amount Payable </span> 
                                    </label>
                                </td>
                                <td class="m-0 p-0 border-0">
                                    
                                    <input 
                                        type="text" readonly
                                        class="form-control  m-0  p-1 floatNumber  form-control-user @error('NetAmtPay') is-invalid @enderror" 
                                        id="NetAmtPay"
                                        placeholder=""  
                                        name="NetAmtPay" 
                                        value="0.00">
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                </div>
                
 

                
                {{-- Save Button --}}
                <!-- Divider -->
                <hr class="sidebar-divider">
                <div class="form-group row m-4">
                    <button type="submit" class="btn btn-success btn-user btn-block mb-4">
                        Save
                    </button>
                </div>

            </form>

           
            
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
                        <div class="modal-body  m-2">
                            <table >
                                <tr> {{-- Search for Item No.--}}
                                    <td class="w-25">
                                        <label for="ItemCode"  >
                                            <span class="h6 small">Item No.:   </span> 
                                        </label>
                                    </td>
                                    <td class="w-75">
                                        <div class="row m-0 p-0">
                                            
                                                <input 
                                                    type="text" 
                                                    class="form-control col-sm-5  m-0  p-1   form-control-user @error('ItemCode') is-invalid @enderror" 
                                                    id="ItemCode" autocomplete="off"
                                                    placeholder=""  
                                                    name="ItemCode" 
                                                    value="{{ old('ItemCode') }}"
                                                >
                                                
                                                <a href="#" id="getItem" class="btn btn-dark rounded-0 m-0 p-0 check-btn-item  ">
                                                    <i class="fas fa-fw fa-check"></i>
                                                    
                                                </a>
                                                @error('ItemCode')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            
                                                
                                            
                                        </div>
                                    </td>
                                

                                <tr> {{-- Item Name--}}
                                    <td width="25%">
                                        <label for="item_name"  >
                                            <span class="h6 small">Item Name:   </span> 
                                        </label>
                                    </td>
                                    <td width="75%" >
                                        <input 
                                            type="text" readonly
                                            class="form-control  m-0  p-1   form-control-user @error('item_name') is-invalid @enderror" 
                                            id="item_name"
                                            placeholder=""  
                                            name="item_name" 
                                            value="{{ old('item_name') }}"
                                        >
                                        <select  id="product_id"  name="product_id"   class="selectpicker ajax-product w-100" data-live-search="true"></select>
                                        {{-- <select  class="form-control  m-0  p-1  " id="search_item" name="ItemCode"></select> --}}
            
                                        @error('item_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </td>
                                    
                                </tr>
                
                                
                                           
                                <tr>{{-- Quantity --}}
                                    <td>
                                        <label for="Qty"  >
                                            <span class="h6 small  ">Quantity: </span> 
                                        </label>
                                        
                                    </td>
                                    <td width="25%">
                                        <div class="row m-0 p-0">
                                            <div class="col-sm-4 m-0 p-0">
                                                <input 
                                                    type="text" 
                                                    class="form-control text-right m-0  p-1  floatNumber form-control-user @error('Qty') is-invalid @enderror" 
                                                    id="Qty"
                                                    placeholder=""  
                                                    name="Qty" 
                                                    value="0"
                                                >
                                            </div>
                                            <div class="col-sm-3 m-0 p-0">
                                        
                                                <input 
                                                    type="text" disabled
                                                    class="form-control m-0  p-1 border-0 bg-white   form-control-user @error('UnitofMeasure') is-invalid @enderror" 
                                                    id="UnitofMeasure"
                                                    placeholder=""  
                                                    name="UnitofMeasure" 
                                                    value="{{ old('UnitofMeasure') }}"
                                                >
                                            </div>
                                        </div>
                                        @error('Qty')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
    
                                    </td>
                                    
                                </tr>
                                
                                <tr>{{-- Unit Cost --}}
                                    <td  >
                                        <label for="Unit" >
                                            <span class="h6 small  ">Unit Price:  </span> 
                                        </label>
                                        
                                    </td>
                                    <td  >
                                        <input 
                                            type="text"  
                                            class="form-control   m-0  p-1 floatNumber col-sm-4  form-control-user @error('UnitSalesPrice') is-invalid @enderror" 
                                            id="UnitSalesPrice"
                                            placeholder=""  
                                            name="UnitSalesPrice" 
                                            value="0.00">

                                        @error('UnitSalesPrice')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </td>
                                    <td colspan="2"></td>
                                    
                                </tr>
                                <tr>{{-- Regular Discount --}}
                                    <td width="25%">
                                        <label for="RegDscntAmt"  >
                                            <span class="h6 small  ">Regular Discount: </span> 
                                        </label>
                                        
                                    </td>
                                    <td width="25%">
                                        <input 
                                            type="text" 
                                            class="form-control  m-0  p-1 col-sm-4 floatNumber form-control-user @error('RegDscntAmt') is-invalid @enderror" 
                                            id="RegDscntAmt"
                                            placeholder=""  
                                            name="RegDscntAmt" 
                                            value="0.00">

                                        @error('RegDscntAmt')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </td>
                                    
                                    
                                    
                                </tr>
                                <tr>{{-- Special Discount --}}
                                    <td>
                                        <label for="SpeDscntAmt"  >
                                            <span class="h6 small  ">Special Discount:  </span> 
                                        </label>
                                        
                                    </td>
                                    <td>
                                        <input 
                                            type="text" 
                                            class="form-control  m-0  p-1 col-sm-4 floatNumber  form-control-user @error('SpeDscntAmt') is-invalid @enderror" 
                                            id="SpeDscntAmt"
                                            placeholder=""  
                                            name="SpeDscntAmt" 
                                            value="0.00">

                                        @error('SpeDscntAmt')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>{{-- Net Unit Price --}}
                                    <td>
                                        <label for="NetUnitPrice"  >
                                            <span class="h6 small  ">Net Unit Price:  </span> 
                                        </label>
                                        
                                    </td>
                                    <td>
                                        <input 
                                            type="text" readonly
                                            class="form-control  m-0  p-1 col-sm-4 floatNumber  form-control-user @error('NetUnitPrice') is-invalid @enderror" 
                                            id="NetUnitPrice"
                                            placeholder=""  
                                            name="NetUnitPrice" 
                                            value="0.00">

                                        @error('NetUnitPrice')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </td>
                                     
                                </tr>
                                <tr>{{-- Net Amount --}}
                                    <td>
                                        <label for="NetAmount"  >
                                            <span class="h6 small  ">Net Amount:  </span> 
                                        </label>
                                        
                                    </td>
                                    <td>
                                        <input 
                                            type="text" readonly
                                            class="form-control  m-0  p-1 col-sm-4 floatNumber  form-control-user @error('NetUnitPrice') is-invalid @enderror" 
                                            id="NetAmount"
                                            placeholder=""  
                                            name="NetAmount" 
                                            value="0.00">

                                        @error('NetAmount')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </td>

                                <tr>{{-- VAT_Type --}}
                                    <td>
                                        <label for="VAT_Type"  >
                                            <span class="h6 small  ">VAT Type  </span> 
                                        </label>
                                        
                                    </td>
                                    <td>
                                        <input 
                                            type="text" readonly 
                                            class="form-control text-right col-sm-4 m-0  p-1  floatNumber form-control-user @error('VAT_Type') is-invalid @enderror" 
                                            id="VAT_Type"
                                            placeholder=""  
                                            name="VAT_Type" 
                                            value="A1"
                                        >
                                    </td>
                                </tr>
                                <tr>{{-- ATC --}}
                                    <td>
                                        <label for="ATC"  >
                                            <span class="h6 small  ">ATC  </span> 
                                        </label>
                                        
                                    </td>
                                    <td>
                                        <input 
                                            type="text"  readonly
                                            class="form-control text-right col-sm-4 m-0  p-1  floatNumber form-control-user @error('ATC') is-invalid @enderror" 
                                            id="ATC"
                                            placeholder=""  
                                            name="ATC" 
                                            value=""
                                        >  
                                    </td>
                                </tr>
                                <tr>{{-- ewt rate --}}
                                    <td>
                                        <label for="EWT_Rate"  >
                                            <span class="h6 small  ">EWT Rate  </span> 
                                        </label>
                                        
                                    </td>
                                    <td>
                                        <input 
                                            type="text" readonly
                                            class="form-control col-sm-4 text-right m-0   p-1  floatNumber form-control-user @error('EWT_Rate') is-invalid @enderror" 
                                            id="EWT_Rate"
                                            placeholder=""  
                                            name="EWT_Rate" 
                                            value="0.00"
                                        >  
                                    </td>
                                </tr>
                                <tr>{{-- Tax Withheld --}}
                                    <td>
                                        <label for="Tax_Withheld"  >
                                            <span class="h6 small  ">Tax Withheld </span> 
                                        </label>
                                        
                                    </td>
                                    <td>
                                        <input 
                                            type="text" readonly
                                            class="form-control col-sm-4 text-right m-0   p-1  floatNumber form-control-user @error('Tax_Withheld') is-invalid @enderror" 
                                            id="Tax_Withheld"
                                            placeholder=""  
                                            name="Tax_Withheld" 
                                            value="0.00"
                                        >  
                                    </td>
                                </tr>
                                
                                  
                            </table> 


                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                            <button type="button" onclick="clearItemEntry()" class="btn btn-dark"  >Clear</button>
                            <button type="button" class="btn btn-success btn-save-item">Save Line Item</button>
                        </div>
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

    

    {{-- Items Datatable and Add/Remove Line Management --}}
    <script>

        let itemArrays =[];
        var itemCount =0;
        $(document).ready(function () {
            // {{-- Items Data Table Management --}}
            var datatable =  $('#dataTable').DataTable({
                data: itemArrays,
                "dom": 't',
                "ordering": false,
                columns: [
                        
                        { data: 'ItemCode', title:"Item No." },
                        { data: 'description', title:"Description" },
                        { data: 'Qty', title:"Qty." },
                        { data: 'UnitofMeasure', title:"Unit" },
                        { data: 'VAT_Type', title:"VAT Type" },
                        { data: 'UnitSalesPrice', title:"Unit Price" },
                        { data: 'RegDscntAmt' , title:"Regular Discount"},
                        { data: 'SpeDscntAmt', title:"Special Discount" },
                        { data: 'NetUnitPrice', title:"Net Price" },
                        { data: 'NetAmount', title:"Amount" },
                        
                        //{ data: null, sortable:false, defaultContent:"<button type='button' id='item_button' class=' btn m-0 p-0'><i class='fas fa-fw fa-trash'></i></button>"},
                    ],
                columnDefs: [
                    { width: 100, targets: 0 },
                    { width: 300, targets: 1 },
                    { width: 80, targets: 2, className: 'dt-body-right' },
                    { width: 80, targets: 3 },
                    { width: 70, targets: 4, },
                    { width: 90, targets: 5, className: 'dt-body-right' },
                    { width: 90, targets: 6, className: 'dt-body-right' },
                    { width: 90, targets: 7, className: 'dt-body-right' },
                    { width: 90, targets: 8, className: 'dt-body-right' },
                    { width: 90, targets: 9, className: 'dt-body-right' }
                ],
            });

            // {{-- Save Invoice Item to Array --}}
            $('.btn-save-item').on('click',function(){
                if ($('#item_name').val() != "" && parseFloat($('#Qty').val())>0){
                    // let itemArray = new array();
                    itemCount ++;
                    let itemArray = {
                        "DT_RowId": itemCount,
                        "ItemCode": $('#ItemCode').val(),
                        "description": $('#item_name').val(),
                        "VAT_Type": $('#VAT_Type').val(),
                        "Qty": $('#Qty').val(),
                        "UnitofMeasure": $('#UnitofMeasure').val(),
                        "UnitSalesPrice": parseFloat($('#UnitSalesPrice').val()).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}),
                        "RegDscntAmt": parseFloat($('#RegDscntAmt').val()).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}),
                        "SpeDscntAmt": parseFloat($('#SpeDscntAmt').val()).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}),
                        "NetUnitPrice": $('#NetUnitPrice').val(),
                        "NetAmount": $('#NetAmount').val(),
                        "ATC": $('#ATC').val(),
                        "EWT_Rate": $('#EWT_Rate').val(),
                        "Tax_Withheld": $('#Tax_Withheld').val(),
                        "id":itemCount,
                    };
                    // alert(itemArray['Qty']);
                    itemArrays.push(itemArray);
                    // alert(itemArrays[0]['Qty']);
                    // $('#itemno').html(itemArrays[0]['Qty']);
                    $('#items').val(JSON.stringify(itemArrays));
                    datatable.clear();
                    // alert(itemArrays[0]['Qty']);
                    datatable.rows.add(itemArrays);
                    datatable.draw();
                    clearItemEntry();
                    computeNetSummary();
                }else{
                    swal.fire("Invalid Item!!!");
                }
            });
             
            // Delete line item 
            var table = $('#dataTable').DataTable(); 
            var selectedRow=0;
            $('#dataTable tbody').on('click', 'tr', function () { 
                if ($(this).hasClass('selected')) { 
                    $(this).removeClass('selected'); 
                    selectedRow=0;
                } else { 
                    table.$('tr.selected').removeClass('selected'); $(this).addClass('selected'); 
                    selectedRow = this.id;
                } 
            }); 
            $('#item_button').click(function () { 
                 
                if (selectedRow!= 0){
                    x =  itemArrays.findIndex(x => x.id == selectedRow);
                    // alert(x)
                    itemArrays.splice(x,1);
                    table.row('.selected').remove().draw(false); 
                    $('#items').val(JSON.stringify(itemArrays));
                    computeNetSummary(); 
                }
            }); 
        });
    </script>

    {{-- Check Customer ID --}}
    <script>
        $("#getBuyer").click(function(){
            
            $('.check-btn').removeClass('checked');
            if($("#buyer_id").val()!=""){
                var getTP_url = "/contacts/getBuyer/"+$("#buyer_id").val() ;
                
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
            // alert("dsfsdf")
            //alert($(this).find(':selected').data('onhand'));
            
            $('#buyer_id').val($(this).find(':selected').data('buyer_id'));
            $('#buyer_name').val($(this).find(':selected').data('registered_name'));
            
            //   getTotal();
            
            // var dataname = $("option[value=" + $(this).val() + "]", this).attr('data-buyer_id');
            // alert(dataname);
            
        });
    </script>

    {{-- Buyer Key Input Change --}}

    <script>
        $(document).ready(function(){
            $('#customer_id').selectpicker('show');
            $('#buyer_name').hide();
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
@endpush
