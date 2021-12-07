@extends('layouts.custom')

@section('page_title', $attendance->created_at->format('F d, Y - g:i A'))

@section('body')

<div class="col-md-8 col-lg-12 grid-margin stretch-card">
        <div class="card card-rounded">
            <div class="card-body card-rounded">
            <h4 class="card-title  card-title-dash">Student List</h4>

            @forelse ($attendance->users as $user)
                <div class="list align-items-center border-bottom py-2">
                    <div class="wrapper w-100">
                        <p class="mb-2 font-weight-medium">
                            {{ $user->name }}
                        </p>
                        <a href="#" style="text-decoration: none;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                <i class="mdi mdi-calendar text-muted me-1"></i>
                                <p class="mb-0 text-small text-muted">{{ $user->pivot->status }} - {{ $user->created_at->format('g:i a') }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            @empty
                <p class="mb-2 font-weight-medium">
                    No Data
                </p>
            @endforelse
            </div>
        </div>
    </div>
@endsection
