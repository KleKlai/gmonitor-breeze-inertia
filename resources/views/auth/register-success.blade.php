@extends('layouts.authentication')

@section('body')
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">

            <div class="col-lg-4 mx-auto">



                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                    <img src="{{ asset('asset/images/logo.png') }}" alt="logo">
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <h4>Congratulations</h4>
                <h6 class="fw-light mb-4">Your account has been successfully created.</h6>

                </div>
            </div>
        </div>
    </div>
@endsection
