 <x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Classroom') }}
        </h2>
    </x-slot>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <div class="row">
                        <div class="col">
                            Update Password
                        </div>
                    </div>
                </h4>
                <form class="forms-sample" action="{{ route('profile.password.update') }}" method="POST">
                    @csrf

                    @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                    @endforeach

                    <div class="form-group">
                      <label for="Name">Current Password</label>
                      <input type="password" class="form-control" name="current_password">
                    </div>
                     <div class="form-group">
                      <label for="Name">New Password</label>
                      <input type="password" class="form-control" name="new_password">
                    </div>
                    <div class="form-group">
                      <label for="Name">New Password</label>
                      <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

</x-custom-layout>
