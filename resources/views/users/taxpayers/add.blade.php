@extends('layouts.master')

@section('content')

<div class="container-fluid p-4">

    {{-- <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Users</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> --}}

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card col-sm-9 p-0 mx-auto shadow rounded-0 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New User - Tax Payer Assignment</h6>
        </div>
        <div class="card-body mb-4">
            <form method="POST" action="{{route('usertaxpayers.assign')}}">
                @csrf
            
                    @if ((session('role_name')=="Admin") || (session('role_name')=="Admin"))
                        <div class="form-group row  m-0 p-0 mb-4">
                            <div class="col-md-5 pr-3 p-0">
                                <label for="tp_name"   class="m-0 p-0"  >
                                    <span class="h6 small ">Tax Payer:  </span> 
                                </label>
                                 

                                
                                <select  id="tp_name"  name="tp_name" class="selectpicker ajax-taxpayer w-100" data-live-search="true"></select>
                                

                                @error('tp_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

 
                    @endif
                    {{-- TIN/Branch/Birth Date --}}
                    <div class="form-group row  m-0 p-0 mb-4">
                       
                        <div class="col-sm-4 m-0 p-0 pr-1">
                            <input 
                                type="hidden" 
                                class="form-control intNumber mt-n3 form-control-user rounded-0 @error('user_id') is-invalid @enderror" 
                                id="user_id"
                                name="user_id" 
                                value="{{ $id }}">
                            <label for="tp_id" class="col-sm-12 pl-1">
                                <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Tax Payer's ID <span style="color:red;">*</span> </span> 
                            </label>
                            <input 
                                type="text" 
                                class="form-control intNumber mt-n3 form-control-user rounded-0 @error('tp_id') is-invalid @enderror" 
                                id="tp_id"
                                placeholder="" 
                                maxlength="20"
                                name="tp_id" 
                                value="{{ old('tp_id') }}">
    
                            @error('tp_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                       
                        <div class="col-sm-4 m-0 p-0 pr-1">
                            
                            <label for="Tin" class="col-sm-12 pl-1">
                                <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">TIN <span style="color:red;">*</span> </span> 
                            </label>
                            <input 
                                type="text" 
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
                        
                         
                    </div>
 

                {{-- Save Button --}}
                <button type="submit" class="btn btn-primary btn-user btn-block col-sm-2 mx-auto">
                    Assign
                </button>

            </form>
        </div>
    </div>

</div>


@endsection
@push('scripts')

    {{-- Select Tax Payer - Select picker --}}
    <script>
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            $('.selectpicker').selectpicker('mobile');
        }

        var path2 = "{{ route('taxpayers.taxpayersList') }}";
        
        var select_tp_name = {
            ajax          : {
                url     :  path2,
                type    : 'get',
                dataType: 'json',
                data    : function() { // This is a function that is run on every request
                    return {
                        id:$(".ajax-taxpayer input").val() //this is an input search parameter
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
                emptyTitle: 'Assign Tax Payer'
            },
            preserveSelected: false,
            clearOnEmpty: true,
            cache: false,
            emptyRequest: true,
            // log           : 3,
            preprocessData: function (data) {
                var i, l = data.length, array2 = [];
                //  alert(data[i].item_name + data[i].ItemCode + data[i].id + data[i].UnitofMeasure+data[i].UnitSalesPrice+data[i].VAT_Type)
                        // alert()
                if (l) {
                    
                    for (i = 0; i < l; i++) {
                       
                        array2.push($.extend(true, data[i], {
                            text : data[i].registered_name,
                            value: data[i].registered_name,
                            tp_id: data[i].tp_id,
                            Tin: data[i].Tin,
                            Tin_BranchCode: data[i].TIN_BranchCode,
                            
                            data : {
                                subtext: "Tax Payer ID:"+ data[i].tp_id,
                                tp_id: data[i].tp_id,
                                tp_name: data[i].registered_name,
                                Tin: data[i].Tin,
                                Tin_BranchCode: data[i].TIN_BranchCode,
                            }
                        }));
                        // alert(JSON.stringify(array2))
                    }
                }
                
                return array2;   
            }
        };

        $('.selectpicker').selectpicker().filter('.ajax-taxpayer').ajaxSelectPicker(select_tp_name);
        $('select.ajax-taxpayer').trigger('change');
        $('#tp_name').change(function(){
            $('#tp_id').val($(this).find(':selected').data('tp_id'));
            $('#TIN_BranchCode').val($(this).find(':selected').data('tin_branchcode'));
            $('#Tin').val($(this).find(':selected').data('tin'));
        });
    </script>

 
@endpush
