@extends('layouts.authentication')

@section('body')
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">

            <div class="col-lg-4 mx-auto">



                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                    <img src="{{ asset('asset/images/logo.svg') }}" alt="logo">
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <h4>Forgot Password</h4>
                <h6 class="fw-light mb-5">Enter your registered email to recover your account.</h6>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" name="email" placeholder="Email">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">EMAIL PASSWORD RESET LINK</button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">

                    </div>
                    {{--  <div class="text-center mt-4 fw-light">
                        <a href="register.html" class="text-primary">Login Instead</a>
                    </div>  --}}
                    <div class="text-center mt-4 fw-light">
                        {{ "Don't have an account?" }} <a href="register.html" class="text-primary">Create</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
