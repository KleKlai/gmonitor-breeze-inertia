
{{-- ==========================================================
-- Feedback Modal
========================================================== --}}

<div id="import-data" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Feedback</h4>
    <div class="custom-modal-text">
        <div class="col-md-12">
            <form action="{{ route('feedback.index')}}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <div class="col">
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="5" name="description" placeholder="Please include a detailed description of your feedback." required>{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <button class='btn btn-success'><i class="mdi mdi-telegram"></i> Send</button>
                    </div>
            </form>
        </div>
    </div>
</div>

