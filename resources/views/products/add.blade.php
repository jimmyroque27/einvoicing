@extends('layouts.master')

@section('content')

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
    
</style>
<div class="container-fluid m-0 p-0 rounded-0 ">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Profile</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> -->

    {{-- Alert Messages --}}
    @include('common.alert')
    <style>
        input.form-control, select.form-control{
            padding: 2px !important;
            /* margin: 2px 2px 2px 2px !important; */
            font-size: .9rem !important;
            height: 30px !important;
        }
         
    </style>
    <!-- Form Registration -->
    <div class="card shadow  m-0 p-0  rounded-0   my-auto mx-auto ">
        <div class="card-header py-3 rounded-0 bg-light  m-0 ">
            <h6 class="m-1 font-weight-bold  text-secondary">Product Information [ADD PRODUCT]</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('products.store')}}">
                @csrf
                <input type="hidden" id="SellerId" name="seller_id" value ="{{Auth::user()->seller_id}}"   />

                {{-- Product Information --}}
                <div class="form-group row">
                    {{-- Product Name --}}
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <input type="hidden" id="SellerId" name="seller_id" value ="{{Auth::user()->seller_id}}"   />

                        <label for="item_name" class="col-sm-12">
                            <span class=" h6 small bg-white ">Product Name  <i class="fas fa-asterisk text-danger"></i></span> 
                        </label>
                    </div>
                    <div class="col-sm-9 mb-3 mb-sm-0">
                        <input 
                            type="text" 
                            class="form-control  form-control-user @error('item_name') is-invalid @enderror" 
                            id="item_name"
                            placeholder="" 
                            name="item_name" 
                            value="{{ old('item_name') }}">

                        @error('item_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>    
                {{-- Product Description --}}
                <div class="form-group row">
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        
                        <label for="Description" class="col-sm-12">
                            <span class="h6 small bg-white  ">Description <i class="fas fa-asterisk text-danger"></i> </span> 
                        </label>
                    </div>
                    <div class="col-sm-9 mb-3 mb-sm-0">
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('Description') is-invalid @enderror" 
                            id="Description"
                            placeholder="" 
                            name="Description" 
                            value="{{ old('Description') }}">

                        @error('Description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        
                    </div>
                </div> 
                <div class="form-group row">
                    
                    <div class="col-sm-2 mb-sm-0 ">
                        <label for="category_name"  class="col-sm-12"   >
                            <span class="h6 small bg-white  ">Category  </span> 
                        </label>
                    </div>
                    <div class="col-sm-4  mb-sm-0  ">
                        <input 
                            type="hidden" 
                            class="form-control form-control-user @error('category_id') is-invalid @enderror" 
                            id="category_id"
                            placeholder="" 
                            name="category_id" 
                            value="{{ old('category_id') }}">

                        <select  id="category_name"  name="category_name"   class="selectpicker ajax-category  form-control-user w-100 form-control   " data-live-search="true"></select>

                        @error('category_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                 
                    

                </div>
                {{-- Unit of Measure --}}
                <div class="form-group row">
                    <div class="col-sm-2 s mb-3 mb-sm-0">
                        <label for="UnitofMeasure" class="col-sm-12">
                            <span class="h6 small bg-white  ">Unit of Measure <i class="fas fa-asterisk text-danger"></i> </span> 
                        </label>
                    </div>
                    <div class="col-sm-2 s mb-3 mb-sm-0">    
                        <input 
                            type="text" 
                            class="form-control  form-control-user @error('UnitofMeasure') is-invalid @enderror" 
                            id="UnitofMeasure"
                            placeholder="" 
                            name="UnitofMeasure" 
                            value="{{ old('UnitofMeasure') }}">

                        @error('UnitofMeasure')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        
                    </div>
                    {{-- Unit Cost --}}
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        
                        <label for="Unit Cost" class="col-sm-12">
                            <span class="h6 small bg-white  ">Unit Sales Price <i class="fas fa-asterisk text-danger"></i> </span> 
                        </label>
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">   
                        <input 
                            type="number" 
                            class="form-control  form-control-user @error('UnitSalesPrice') is-invalid @enderror" 
                            id="UnitSalesPrice"
                            placeholder="" 
                            name="UnitSalesPrice" 
                            value="{{ old('UnitSalesPrice') }}">

                        @error('UnitSalesPrice')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        
                    </div>
                </div>
               {{-- Vat Type --}}
                <div class="form-group row">
                    
                    <div class="col-sm-2  mb-sm-0">
                        
                        <label for="Vat Type" class="col-sm-12">
                            <span class="h6 small bg-white  ">VAT Type <i class="fas fa-asterisk text-danger"></i> </span> 
                        </label>
                    </div>
                    <div class="col-sm-3  mb-sm-0">
                        <select class="form-control    form-control-user" 
                            id="VAT_Type" 
                            value="{{ old('VAT_Type') }}" 
                            placeholder="" 
                            name="VAT_Type">
                            <option value="A1" selected>A1 - Value Added Tax (12%)</option>
                            <option value="A2">A2 - Zero Rated VAT (0%)</option>
                            <option value="A3">A3 - VAT Exempt</option>
                        </select>

                        @error('VAT_Type')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        
                    </div>
                </div>
                 {{-- atc --}}
                <div class="form-group row">
                    
                    <div class="col-sm-2 mb-sm-0 ">
                        <label for="atc"  class="col-sm-12"   >
                            <span class="h6 small bg-white  ">Alpha Tax Code  </span> 
                        </label>
                    </div>
                    <div class="col-sm-4  mb-sm-0  ">
                        <select  id="atc"  name="atc"   class="selectpicker ajax-atc  form-control-user w-100 form-control   " data-live-search="true"></select>

                        @error('atc')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                 
                    {{-- EWT Rate --}}
                    
                    <div class="col-xl-3  p-0 m-0">
                        <div class="row">
                            <div class="col-sm-4 mb-sm-0  p-1  ">
                                <label for="EWT_Rate" class="col-sm-12">
                                    <span class="h6 small bg-white  ">EWT Rate</span> 
                                </label>
                            </div>
                            <div class="col-sm-5  mb-sm-0  p-1">
                                <input 
                                    type="text" readonly
                                    class="form-control floatNumber  form-control-user @error('EWT_Rate') is-invalid @enderror" 
                                    id="EWT_Rate"
                                    placeholder="" 
                                    name="EWT_Rate" 
                                    value="0.00">
        
                                @error('EWT_Rate')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                
                            </div>
                            <div class="col-sm-1  mb-sm-0  p-1">
                                %
                            </div>
                        </div>
                    </div>
                    

                </div>
                <div class="form-group row">
                  
                   
 
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
    {{-- Search ATC - Select picker --}}
    <script>
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            $('.selectpicker').selectpicker('mobile');
        }

        var path2 = "{{ route('atc.atcList') }}";
        // alert(path2)
        var select_atc = {
            ajax          : {
                url     :  path2,
                type    : 'get',
                dataType: 'json',
                data    : function() { // This is a function that is run on every request
                    return {
                        id:$(".ajax-atc input").val() //this is an input search parameter
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
                emptyTitle: 'Select ATC'
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
                            text : data[i].atc_code,
                            value: data[i].atc_code,
                            ewt_rate: data[i].ewt_rate,
                            
                            data : {
                                subtext: data[i].description.substr(0,50),
                                ewt_rate: data[i].ewt_rate,
                                 
                            }
                        }));
                        // alert(JSON.stringify(array2))
                    }
                }
                
                return array2;   
            }
        };

        $('.selectpicker').selectpicker().filter('.ajax-atc').ajaxSelectPicker(select_atc);
        $('select.ajax-atc').trigger('change');
        $('#atc').change(function(){
            // alert("dsfsdf")
        //     // //alert($(this).find(':selected').data('onhand'));
            
            $('#EWT_Rate').val($(this).find(':selected').data('ewt_rate'));
        //     // $('#buyer_name').val($(this).find(':selected').data('registered_name'));
            
       
            
        });
    </script>


    {{-- Search Category - Select picker --}}
    <script>
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            $('.selectpicker').selectpicker('mobile');
        }

        var path2 = "{{ route('categoryList') }}";
        // alert(path2)
        var select_category = {
            ajax          : {
                url     :  path2,
                type    : 'get',
                dataType: 'json',
                data    : function() { // This is a function that is run on every request
                    return {
                         
                        id:$(".ajax-category input").val() //this is an input search parameter
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
                emptyTitle: 'Select Product Category'
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
                        
                        array2.push($.extend(true, data[i], {
                            text : data[i].name,
                            value: data[i].id,
                            category_id: data[i].id,
                            
                            data : {
                                // subtext: data[i].name.substr(0,50),
                                category_id: data[i].id,
                                
                            }
                        }));
                        // alert(JSON.stringify(array2))
                    }
                }
                
                return array2;   
            }
        };

        $('.selectpicker').selectpicker().filter('.ajax-category').ajaxSelectPicker(select_category);
        $('select.ajax-category').trigger('change');
        $('#category_name').change(function(){
            $('#category_id').val($(this).find(':selected').data('category_id'));              
        });
    </script>
@endpush