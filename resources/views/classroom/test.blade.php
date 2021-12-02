@extends('layouts.custom')

@section('page_title', 'Test File')

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
                {{ $data }}
            </div>
        </div>
    </div>
@endsection
