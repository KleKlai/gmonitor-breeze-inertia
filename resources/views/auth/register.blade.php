@extends('layouts.authentication')

@section('body')
    <div class="content-wrapper d-flex align-items-center  auth px-0">
        <div class="row w-100 mx-0">

            <div class="col-lg-4 mx-auto">

                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                    <img src="{{ asset('asset/images/logo.png') }}" alt="logo">
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

                <h4>Register Account</h4>
                {{--  <h6 class="fw-light mb-4">Lorem Ipsum Lorem Ipsum Lorem Ipsum</h6>  --}}
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Register As</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="role" value="student" checked="">
                                Student
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="role" value="teacher">
                                Teacher
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="name" value="{{ old('name', '') }}" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" name="email" value="{{ old('email', '') }}" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">REGISTER</button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                    </div>
                    <div class="text-center mt-4 fw-light">
                        Have an account? <a href="{{ route('login') }}" class="text-primary">Login instead</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
