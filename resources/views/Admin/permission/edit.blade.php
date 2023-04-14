@extends('layouts.master')

@section('content')

<div class="container-fluid m-0 p-0 rounded-0">

    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Permission</h1>
        <a href="{{route('admin.permission.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> --}}

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow m-0 p-0 rounded-0 mb-4">
        <div class="card-header py-3">
            
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Permission</h6>
                <a href="{{route('admin.permission.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            
            {{--  --}}
            <form method="POST" action="{{ route('admin.permission.update', $permission->id) }}">
                @csrf
                @method('PUT')
                    <div class="py-2">
                        <div class="form-group row">                        
                    
                            <div class="col-sm-2 mt-2">
                                <label for="name" class="block font-medium text-sm text-gray-700{{$errors->has('name') ? ' text-red-400' : ''}}">{{ __('Permission Name') }}</label>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input id="name" 
                                
                                    class=" form-control form-control-user  w-full{{$errors->has('name') ? ' border-red-400' : ''}}"
                                    type="text"
                                    name="name"
                                    value="{{ old('name', $permission->name) }}"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type='submit' class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
                            {{ __('Update') }}
                        </button>
                    </div>
                </form>

        </div>
    </div>

</div>


@endsection