@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Role</h1>
        <a href="{{route('admin.role.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Role</h6>
        </div>
        <div class="card-body">
            {!! Form::model($role, ['method' => 'PUT','route' => ['admin.role.update', $role->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
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
                            {{-- @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                            @endforeach --}}

                            <?php $ctr =0; ?>
                            <div class="row">
                                @foreach($permission as $value)
                                    
                                    @if($ctr==5)
                                        </div>
                                        <div class="row">
                                        
                                        <?php $ctr =0; ?>
                                       
                                    @endif
                                    <?php  $ctr ++; ?>
                                    <div class="col-sm-2">
                                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
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