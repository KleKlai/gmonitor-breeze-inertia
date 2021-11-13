@extends('layouts.authentication')

@section('body')
<div class="content-wrapper d-flex align-items-center auth px-0">
    <div class="row w-100 mx-0">

        <div class="col-lg-4 mx-auto">

            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="brand-logo">
                <img src="{{ asset('asset/images/logo.svg') }}" alt="logo">
            </div>

            @if ($errors->any())
                <div {{ $attributes }}>
                    <div class="font-medium text-red-600">
                        {{ __('Whoops! Something went wrong.') }}
                    </div>

                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h4>Hello! let's get started</h4>
            <h6 class="fw-light mb-4">Sign in to continue.</h6>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                <input type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
                <div class="form-group">
                <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                    Keep me signed in
                    </label>
                </div>
                <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="text-center mt-4 fw-light">
                Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
