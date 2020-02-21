@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Change Your Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" aria-label="{{ __('Reset Password') }}">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Password Change') }}
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="col-4">
                 <div class="card" style="width: 18rem;">
                  <img src="{{ asset('public/avatar.jpg') }}" class="card-img-top" style="height: 90px; width: 90px; margin-left: 34%;" >
                  <div class="card-body">
                    <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{ route('password.change') }}"> Password Change </a></li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                  </ul>
                  <div class="card-body">
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                  </div>
                </div>
               </div>
        </div>
    </div>
</div>

@endsection
