@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sign In') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email/Phone" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Sign In') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="mt-3"><a href="{{route('password.request')}}">Forget Password?</a></div>
                    <div class="btn btn-primary mt-3"><a href="#" class="text-white">Log In With Facebook</a></div></br>
                    <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger mt-3"><i class="fa fa-google"></i>Log In With Google</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
