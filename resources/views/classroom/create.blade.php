@extends('layouts.custom')

@section('page_title', 'Classroom')

@section('body')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <div class="row">
                        <div class="col">
                            Create class
                        </div>
                    </div>
                </h4>

                @if ($errors->any())
                    <div>
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

                <form class="forms-sample" action="{{ route('classroom.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                      <label for="Name">Class name</label>
                      <input type="text" class="form-control" name="class_name" placeholder="Class name">
                    </div>
                    {{--  <div class="form-group">
                      <label for="Name">Section</label>
                      <input type="text" class="form-control" name="Name" placeholder="Section">
                    </div>
                    <div class="form-group">
                      <label for="Name">Subject</label>
                      <input type="text" class="form-control" name="Name" placeholder="Subject">
                    </div>  --}}
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
