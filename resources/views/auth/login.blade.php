@extends('layouts.auth')

@section('content')
    <!--begin::Signin-->
    <div class="login-form login-signin">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="font-size-h1">Sign In</h3>
            <p class="text-muted font-weight-bold">Enter your username and password</p>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('login') }}" class="form">
            @csrf
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6 @error('email') is-invalid @enderror"
                    type="email" placeholder="Email" required name="email" autocomplete="email" autofocus />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6 @error('password') is-invalid @enderror"
                    type="password" placeholder="Password" name="password" autocomplete="current-password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--begin::Action-->
            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Sign In</button>
            </div>
            <!--end::Action-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signin-->
@endsection
