@extends('layouts.master')

@section('content')

<div class="container-fluid m-0 p-0 rounded-0">

   
    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow m-0 p-0 rounded-0 mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Role</h6>
        </div>
        <div class="card-body">
            {!! Form::open(array('route' => 'admin.role.store','method'=>'POST')) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Role Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            <div class="row col-sm-12">
                                <label>{{ Form::checkbox('selectAll', 1, false, array('class' => 'selectAll')) }}
                                Select All</label>
                            </div>
                            <?php $ctr =0; ?>
                            <div class="row">
                                @foreach($permissions as $value)
                                    
                                    @if($ctr==5)
                                        </div>
                                        <div class="row">
                                        
                                        <?php $ctr =0; ?>
                                        
                                    @endif
                                    <?php  $ctr ++; ?>
                                    <div class="col-sm-2">
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</label>
                                    </div>
                                
                                    {{-- <br/> --}}
                                @endforeach
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            {!! Form::close() !!}

        </div>
    </div>

</div>


@endsection
@push('scripts')
    <script>
        $(".selectAll").click(function(){
            $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

        });
    </script>
@endpush