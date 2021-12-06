@extends('layouts.custom')

@section('page_title', 'Your Questions')

@section('body')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="mt-4">
                    <div class="accordion" id="accordion" role="tablist">
                        @forelse ($questions as $key => $question)
                            <div class="card">
                                <div class="card-header" role="tab" id="heading-{{ $key }}">
                                    <h6 class="mb-0">
                                        <a data-bs-toggle="collapse" href="#collapse-{{ $key }}" aria-expanded="true" aria-controls="collapse-{{ $key }}" class="fw-bold">
                                            {{ $question->question }}
                                        </a>
                                        <p class="text-small">{{ $question->created_at->format('F d, Y - g:i A') }}</p>
                                    </h6>
                                </div>
                                <div id="collapse-{{ $key }}" class="collapse" role="tabpanel" aria-labelledby="heading-{{ $key }}" data-bs-parent="#accordion" style="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <div>
                                                        <h4 class="card-title card-title-dash">Answer</h4>
                                                    </div>
                                                </div>
                                                @forelse ($question->answers as $answer)
                                                    <div class="mt-3">
                                                        <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                                            <div class="d-flex">
                                                            <div class="wrapper ms-3">
                                                                <p class="ms-1 mb-1 fw-bold">{{ ($answer->visibility == 'anonymous') ? 'Anonymous' : $answer->user->name; }}</p>
                                                                <small class="text-muted mb-0">{{ $answer->answer }}</small>
                                                            </div>
                                                            </div>
                                                            <div class="text-muted text-small">
                                                                {{ $answer->created_at->format('g:i A') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="text-muted text-small">Nothing to see here — yet</div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <h4 class="text-muted">Nothing to see here — yet</h4>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
