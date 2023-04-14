@extends('auth.layouts.app')


@section('content')
<div class="row justify-content-center">
    <style>
        .bg-register-image{
            background: url("{{ asset('images/registerkey.jpg')}}") !important;

        }
    </style>
    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-register-image">
                         
                    </div>
                    {{-- <div class="col-lg-6 d-none d-lg-block"></div> --}}
                    <div class="col-lg-6">
                        <div class="p-3">
                            <div class="text-center">
                                <h1 class="h4 text-primary mb-4">Register Your Account!</h1>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                {{-- <div class="form-group">
                                    <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
                                <div class="form-group  m-0 p-1">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input id="first_name" 
                                            type="text" 
                                            class="form-control form-control-user @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" 
                                            required 
                                            autocomplete="off" placeholder="First Name" autofocus>
            
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="last_name" type="text" class="form-control form-control-user @error('last_name') is-invalid @enderror" 
                                            name="last_name" value="{{ old('last_name') }}" required 
                                            autocomplete="off" placeholder="Last Name" autofocus>
    
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                  
                                <div class="form-group  m-0 p-1">
                                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" 
                                    name="email" value="{{ old('email') }}" required 
                                    autocomplete="off" 
                                    autofocus placeholder="Enter Email Address.">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group  m-0 p-1">
                                    <input id="password" type="password" 
                                        class="form-control form-control-user @error('password') is-invalid @enderror" 
                                        name="password" required autocomplete="off" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group  m-0 p-1">
                                        <input id="password-confirm" type="password" class="form-control form-control-user" 
                                            name="password_confirmation" required 
                                            autocomplete="off" placeholder="Confirm Password">
                                </div>
                                <div class="form-group m-0 p-1">
                                    
                                    <span class="h6 text-primary ">Your password must include at least</span><br>
                                    <div>
                                        <span class="small col-sm-6"> &#9989; Eight characters</span>
                                        <span class="small col-sm-6"> &#9989; One capital letter</span>
                                    </div>
                                    <div>
                                        <span class="small col-sm-6"> &#9989; One lower-case letter</span>
                                        <span class="small col-sm-6"> &#9989; One number</span>
                                    </div>
                                    <div >
                                        <span class="small col-sm-12"> &#9989; One special symbol !"#$%&'()*,.:;<>?@[\]^_`{|}~</span>
                                    </div>
                                </div>
                                <div class="form-group m-0 p-1">
                                    <input required type="checkbox" name="agreeTerms" value="check" 
                                    id="agreeTerms" /> I accept <a href="#"> Terms and Conditions</a><br>
                                    @error('agreeTerms')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input required type="checkbox" name="agreePrivacy" value="check" id="agreePrivacy" /> I agree with use of cookies by this website according to <a href="#"> E-Invoicing.ph Privacy Policy </a>
                                    @error('agreePrivacy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <button class="btn btn-primary btn-user btn-block">
                                    Register
                                </button>
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{route('login')}}">Login Here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
