{{--  <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>  --}}

<x-authentication-layout>
    <div class="content-wrapper d-flex align-items-center  auth px-0">
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

                <h4>Register Account</h4>
                <h6 class="fw-light mb-4">Lorem Ipsum Lorem Ipsum Lorem Ipsum</h6>
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
</x-authentication-layout>
