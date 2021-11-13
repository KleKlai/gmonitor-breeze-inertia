<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notification') }}
        </h2>
    </x-slot>

    @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
    @endif

    <div class="col-12 grid-margin">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Jquery-toast positions</h4>
            <p class="card-description">
            The <code>position</code> property can be used to specify the predefined positions
            of toasts
            </p>
        </div>
        </div>
    </div>

    <div class="col-12 grid-margin">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Maynard Magallen</h4>
            <p class="card-description">
            The <code>position</code> property can be used to specify the predefined positions
            of toasts
            </p>
        </div>
        </div>
    </div>

    <div class="col-12 grid-margin">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Jquery-toast positions</h4>
            <p class="card-description">
            The <code>position</code> property can be used to specify the predefined positions
            of toasts
            </p>
        </div>
        </div>
    </div>

</x-custom-layout>
