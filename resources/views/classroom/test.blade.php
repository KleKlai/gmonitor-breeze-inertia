@extends('layouts.custom')

@section('page_title', 'Attendance')

@section('body')
<div class="col-md-12 col-lg-12 grid-margin stretch-card">
    <div class="card card-rounded">
        <div class="card-body card-rounded">
        <h4 class="card-title  card-title-dash">Recent</h4>

        @foreach ($attendances as $attendance)
            <div class="list align-items-center border-bottom py-2">
                <div class="wrapper w-100">
                    {{--  <p class="mb-2 font-weight-medium">
                        {{ $attendance->classroom_id }}
                    </p>  --}}
                    <a href="{{ route('attendance-users', $attendance->id) }}" style="text-decoration: none;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                            <i class="fas fa-calendar text-muted me-1"></i>
                            <p class="mb-0 text-small text-muted">{{ $attendance->created_at->format('F d, y - g:i a') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection
