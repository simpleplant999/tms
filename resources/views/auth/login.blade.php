@extends('layouts.app')

@section('content')
<div class="container">
   
    <div class="row d-flex justify-content-center align-items-center" style="height: 100vh">
        
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header text-center h4">{{ __('Login') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group row">
                                <div class="col-lg-3 col-sm-12"></div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="email" class="text-left" style="text-align: left!important">Email Address</label>
                                </div>
                                <div class="col-lg-3 col-sm-12"></div>
                                <div class="col-lg-3 col-sm-12"></div>
                                <div class="col-lg-6 col-sm-12">
                                    <input type="email" class="form-control w-100 @error('email') is-invalid @enderror" name="email" id="email"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-sm-12"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 col-sm-12"></div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="password" class="text-left" style="text-align: left!important">Password</label>
                                </div>
                                <div class="col-lg-3 col-sm-12"></div>
                                <div class="col-lg-3 col-sm-12"></div>
                                <div class="col-lg-6 col-sm-12">
                                    <input type="password" class="form-control w-100 @error('password') is-invalid @enderror" name="password" id="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-sm-12"></div>
                        <div class="col-12 mt-4">
                            <center>
                                <button type="submit" class="btn btn-primary btn-block w-50">Login</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
