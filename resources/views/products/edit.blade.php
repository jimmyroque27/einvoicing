@extends('layouts.master')

@section('content')
<style>
    input.form-control, select.form-control, textarea.form-control{
        padding: 2px !important;
        /* margin: 2px 2px 2px 2px !important; */
        font-size: .9rem !important;
        /* height: 30px !important; */
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
                <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
                @can('product-list')
                    <a href="{{route('products.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
                @endcan
            </div>
        </div>
        <div class="card-body small">
            
            {!! Form::model($product, ['method' => 'PATCH','route' => ['products.update', $product->id]]) !!}
            <div class="row">
                <div class="col-sm-2 mb-2 ">
                    <strong>Item Code:</strong>
                    {!! Form::text('ItemCode', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off','readonly')) !!}
                    @error('ItemCode')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row">  
                <div class="col-sm-12 mb-2 ">
                    <strong>Product Name:</strong>
                    {!! Form::text('item_name', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                    @error('item_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row"> 
                <div class="col-sm-12 mb-2 ">
                    <strong>Description:</strong>
                    {!! Form::textarea('Description', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off','rows'=>'2')) !!}
                    @error('Description')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row"> 
                <div class="col-sm-6  mb-sm-0 input_category_name ">
                    {!! Form::hidden('category_id', null, array('placeholder' => '','class' => 'form-control', 'id'=>"category_id")) !!}
                  
                    <strong>Product Category:</strong>
                    
                   
                    {!! Form::text('category_name', null, array('class' => 'form-control',  'id'=>'category_name')) !!}
                    @error('category_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
                <div class="col-sm-6  mb-sm-0 select_category_name ">
                    <strong>Product Category:</strong>  
                    <select  id="select_category_name"  name="select_category_name"   class="selectpicker ajax-category  form-control-user w-100 form-control   " data-live-search="true"></select>

                    
                </div>
                <div class="col-sm-2 mb-2 ">
                    <strong>Unit of Measure:</strong>
                    {!! Form::text('UnitofMeasure', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                    @error('UnitofMeasure')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-2 ">
                    <strong>Unit Price:</strong>
                    {!! Form::text('UnitSalesPrice', null, array('placeholder' => '','class' => 'form-control floatNumber','autocomplete'=>'off','id'=>'UnitSalesPrice')) !!}
                    @error('UnitSalesPrice')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row"> 
                 {{-- Vat Type --}}
                  
                 <div class="col-sm-2 mb-2 ">
                    <strong>VAT</strong>
                    {!! Form::select('VAT_Type', array("A1"=>"A1 - Value Added Tax (12%)","A2"=>"A2 - Zero Rated VAT (0%)","A3"=>"A3 - VAT Exempt"),null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off')) !!}
                    @error('VAT_Type')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-sm-4 mb-2 input_ATC">
                    <strong>Alpha Tax Code:</strong>
                    {!! Form::text('ATC', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off','id'=>'ATC')) !!}
                    @error('ATC')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
                <div class="col-sm-4 mb-2 select_ATC">
                    <strong>Alpha Tax Code:</strong>
                    <select  id="select_ATC"  name="select_ATC"   class="selectpicker ajax-atc  form-control-user w-100 form-control   " data-live-search="true"></select>

                    
                    
                 
                    {{-- EWT Rate --}}
                </div>    
                <div class="col-sm-2  mb-2 ">
                    <strong>EWT Rate:</strong>
                    
                    {!! Form::text('EWT_Rate', null, array('placeholder' => '','class' => 'form-control','autocomplete'=>'off','id'=>'EWT_Rate')) !!}
                     

                    @error('EWT_Rate')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                         
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
    {{-- Search ATC - Select picker --}}
    <script>
        $("#UnitSalesPrice").change(function(){
            if ($("#UnitSalesPrice").val()==""){
                $("#UnitSalesPrice").val("0.00");
            }
        });
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
                            atc: data[i].atc_code,
                            data : {
                                subtext: data[i].description.substr(0,50),
                                ewt_rate: data[i].ewt_rate,
                                atc: data[i].atc_code,
                                 
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
        $('#select_ATC').change(function(){      
            $('#EWT_Rate').val($(this).find(':selected').data('ewt_rate'));  
            $('#ATC').val($(this).find(':selected').data('atc'));   
            // alert($('#ATC').val())
        });
        $('.select_ATC').hide(); 
        $('#ATC').focus(function(){
            $('.input_ATC').hide(); 
            $('.select_ATC').show(); 
             
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
                            category_name: data[i].name,
                            data : {
                                // subtext: data[i].name.substr(0,50),
                                category_id: data[i].id,
                                category_name: data[i].name,
                                
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
        $('#select_category_name').change(function(){
            $('#category_id').val($(this).find(':selected').data('category_id'));     
            $('#category_name').val($(this).find(':selected').data('category_name'));   
            
        });
        $('.select_category_name').hide(); 
        $('#category_name').focus(function(){
            $('.input_category_name').hide(); 
            $('.select_category_name').show(); 
             
        });
         
    </script>
@endpush