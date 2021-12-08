@extends('layouts.custom')

@section('page_title', $classroom->name)

@section('body')

@if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif

@if(Session::has('error'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif

<div class="row">
    <div class="col-sm-12">
        <div class="home-tab">
            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active ps-0" id="student-list-tab" data-bs-toggle="tab" href="#studentlist" role="tab" aria-controls="studentlist" aria-selected="true">Student List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ask-question-tab" data-bs-toggle="tab" href="#ask-question" role="tab" aria-selected="false">Ask Question</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="live-answer-tab" data-bs-toggle="tab" href="#live-answers" role="tab" aria-selected="false">Live Answers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="share-access-tab" data-bs-toggle="tab" href="#share-access" role="tab" aria-selected="false">Share Access</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('attendance-classroom', $classroom) }}" role="tab" aria-selected="true">Attendance</a>
                </li>
                <li class="nav-item">
                    <a class="border-0 nav-link" id="settings-tab" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a>
                </li>
                </ul>
                <div>
                </div>
            </div>
            <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="studentlist" role="tabpanel" aria-labelledby="studentlist">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <div class="row">
                                    <div class="col">
                                        Students
                                    </div>
                                </div>
                            </h4>
                            <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th> Name </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $student)
                                        <tr>
                                            <td>{{ $student->name }}</td>
                                            <td>
                                                <form action="{{ route('unenroll.student', [$classroom, $student]) }}" method="get">
                                                    @csrf

                                                    <input name="_method" type="hidden" value="Unenroll">
                                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Unenroll'>Unenroll</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Invite students to your class</a></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="ask-question" role="tabpanel" aria-labelledby="ask-question">

                    <a href="{{ route('question-all', $classroom) }}" class="btn btn-outline-primary btn-fw">All Questions</a>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="">
                                        Ask questions to your students
                                    </h4>
                                    <form class="forms-sample" action="{{ route('ask.question', $classroom) }}" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="Name">Question</label>
                                            <input type="text" class="form-control" name="question" placeholder="Write your question here." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Answer By</label>
                                            <select class="form-control" name="answer_by" required>
                                                <option value="yes/no">Yes/No</option>
                                                <option value="enum">Enumeration</option>
                                            </select>
                                        </div>
                                        <button id="submit-question" type="submit" class="btn btn-primary">Send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="live-answers" role="tabpanel" aria-labelledby="live-answers">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="accordion w-100" id="accordionQuestionsFromStudents">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingQuestionsFromStudents">
                                    <button
                                        class="accordion-button"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseQuestionsFromStudents"
                                        aria-expanded="false"
                                        aria-controls="collapseQuestionsFromStudents"
                                    >
                                        <div class="text-blue-600" style="font-size: 0.8rem;">
                                            <div class="position-relative">
                                                Students questions
                                                <span class="top-0 position-absolute translate-middle badge rounded-pill bg-primary">
                                                    <span class="students-ask">0</span>
                                                    <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </div>
                                        </div>
                                    </button>
                                  </h2>
                                  <div id="collapseQuestionsFromStudents" class="accordion-collapse collapse" aria-labelledby="headingQuestionsFromStudents" data-bs-parent="#accordionQuestionsFromStudents">
                                    <div class="accordion-body bg-light">
                                        <ul class="px-4 mt-2 mb-0 border list-unstyled ask-list border-1 border-primary bg-primary" style="border-radius: 0.5rem; height: 16rem; overflow-y: scroll;">
                                            @foreach ($ask_questions as $ask_question)
                                                <li class="my-4 bg-transparent">
                                                    <div class="d-inline-block">
                                                        <div class="flex-row px-3 py-2 bg-white d-flex" style="border-radius: 0.5rem;">
                                                            {{--  <img src="{{ asset('asset/images/faces/face8.jpg') }}" alt="avatar">  --}}
                                                            <div class="flex-col d-flex" style="padding-left: 0.7rem;">
                                                                <div class="lh-base">
                                                                    @if ($ask_question->visibility === 'anonymous')
                                                                        <div class="name">Anonymous</div>
                                                                    @else
                                                                        <div class="name">{{ $ask_question->user->name }}</div>
                                                                    @endif
                                                                    <div class="question">{{ $ask_question->question }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <script>
                                // pusher
                                let student_ask = document.querySelector(".students-ask");
                                let channel_ask = pusher.subscribe("ask.{{ $ask_questions->first() ? $ask_questions->first()->classroom_id : 0 }}");
                                let ask_list = document.querySelector(".ask-list");

                                student_ask.textContent = {{ $ask_questions->count() }};

                                channel_ask.bind('ask.new', function(data) {
                                    console.log('new ask: ', data);

                                    oldVal = student_ask.textContent;

                                    student_ask.textContent = parseInt(oldVal) + 1;

                                    temp = '<div class="d-inline-block">';
                                    temp += '<div class="flex-row px-3 py-2 bg-white d-flex" style="border-radius: 0.5rem;">';
                                    temp += '<div class="flex-col d-flex" style="padding-left: 0.7rem;">';
                                    temp += '<div class="lh-base">';

                                    if (data.question.visibility === 'anonymous') {
                                        temp += '<div class="name">Anonymous</div>';
                                    }
                                    else {
                                        temp += '<div class="name">' + data.question.user.name + '</div>';
                                    }

                                    temp += '<div class="answer">' + data.question.question + '</div>';
                                    temp += '</div>';
                                    temp += '</div>';
                                    temp += '</div>';
                                    temp += '</div>';

                                    item = document.createElement('li');
                                    item.className = 'my-4 bg-transparent';
                                    item.innerHTML = temp;
                                    ask_list.appendChild(item);
                                });
                                // pusher
                            </script>
                            <div class="statistics-details d-flex align-items-center justify-content-between">
                                <div class="accordion w-100" id="accordionQuestions">
                                    @foreach ($questions as $question)
                                        <div class="my-2 accordion-item">
                                            <h2 class="accordion-header" id="heading-{{ $question['id'] }}">
                                                <button
                                                    class="accordion-button"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapse-{{ $question['id'] }}"
                                                    aria-expanded="false"
                                                    aria-controls="collapse-{{ $question['id'] }}"
                                                >
                                                    <table class="w-100">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="text-blue-600" style="font-size: 0.8rem;">
                                                                        <div class="position-relative">
                                                                            Question
                                                                            <span class="top-0 position-absolute translate-middle badge rounded-pill bg-primary">
                                                                                <span class="answered-c{{ $question['classroom_id'] }}q{{ $question['id'] }}">0</span>
                                                                                <span class="visually-hidden">unread messages</span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="pt-2 text-black w-100">
                                                                        {{ $question['question'] }}
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </button>
                                            </h2>
                                            <div
                                                id="collapse-{{ $question['id'] }}"
                                                class="accordion-collapse collapse"
                                                aria-labelledby="heading-{{ $question['id'] }}"
                                                data-bs-parent="#accordionQuestions"
                                            >
                                                <div class="accordion-body bg-light">
                                                    <ul class="px-4 mt-2 mb-0 border list-unstyled answer-list answer-list-c{{ $question['classroom_id'] }}q{{ $question['id'] }} border-1 border-primary bg-primary" style="border-radius: 0.5rem;">
                                                        @foreach ($question->answers as $answer)
                                                            <li class="my-4 bg-transparent">
                                                                <div class="d-inline-block">
                                                                    <div class="flex-row px-3 py-2 bg-white d-flex" style="border-radius: 0.5rem;">
                                                                        {{-- <img src="{{ asset('asset/images/faces/face8.jpg') }}" alt="avatar"> --}}
                                                                        <div class="flex-col d-flex" style="padding-left: 0.7rem;">
                                                                            <div class="lh-base">
                                                                                @if ($answer->visibility === 'anonymous')
                                                                                    <div class="name">Anonymous</div>
                                                                                @else
                                                                                    <div class="name">{{ $answer->user->name }}</div>
                                                                                @endif
                                                                                <div class="answer">{{ $answer->answer }}</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>

                                            <script>
                                                // pusher
                                                let channel_c{{ $question['classroom_id'] }}q{{ $question['id'] }} = pusher.subscribe("answer.c{{ $question['classroom_id'] }}q{{ $question['id'] }}");
                                                let answered_c{{ $question['classroom_id'] }}q{{ $question['id'] }} = document.querySelector(".answered-c{{ $question['classroom_id'] }}q{{ $question['id'] }}");
                                                let answer_list_c{{ $question['classroom_id'] }}q{{ $question['id'] }} = document.querySelector(".answer-list-c{{ $question['classroom_id'] }}q{{ $question['id'] }}");

                                                answered_c{{ $question['classroom_id'] }}q{{ $question['id'] }}.textContent = {{ $question->answers->count() }};

                                                channel_c{{ $question['classroom_id'] }}q{{ $question['id'] }}.bind('answer.new', function(data) {
                                                    console.log('new answer: ', data);

                                                    oldVal = answered_c{{ $question['classroom_id'] }}q{{ $question['id'] }}.textContent;

                                                    answered_c{{ $question['classroom_id'] }}q{{ $question['id'] }}.textContent = parseInt(oldVal) + 1;

                                                    temp = '<div class="d-inline-block">';
                                                    temp += '<div class="flex-row px-3 py-2 bg-white d-flex" style="border-radius: 0.5rem;">';
                                                    temp += '<div class="flex-col d-flex" style="padding-left: 0.7rem;">';
                                                    temp += '<div class="lh-base">';

                                                    if (data.answer.visibility === 'anonymous') {
                                                        temp += '<div class="name">Anonymous</div>';
                                                    }
                                                    else {
                                                        temp += '<div class="name">' + data.answer.user.name + '</div>';
                                                    }

                                                    temp += '<div class="answer">' + data.answer.answer + '</div>';
                                                    temp += '</div>';
                                                    temp += '</div>';
                                                    temp += '</div>';
                                                    temp += '</div>';

                                                    item = document.createElement('li');
                                                    item.className = 'my-4 bg-transparent';
                                                    item.innerHTML = temp;
                                                    answer_list_c{{ $question['classroom_id'] }}q{{ $question['id'] }}.appendChild(item);
                                                });
                                                // pusher
                                            </script>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="share-access" role="tabpanel" aria-labelledby="share-access">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-lg-8 d-flex flex-column">
                                <div class="flex-grow row">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded table-darkBGImg">
                                        <div class="card-body">
                                            <div class="col-sm-8">
                                            <h3 class="mb-0 text-white upgrade-info">
                                                Share your <span class="fw-bold">Code</span> for better outreach
                                            </h3>
                                            <div value="{{ $classroom->code }}" id="classcode" onclick="copyToClipboard('{{ $classroom->code }}')" class="btn btn-info upgrade-btn">{{ $classroom->code }}</div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="settings" role="tabpanel" aria-labelledby="settings">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Settings</h4>
                                <p class="card-description">
                                    {{ "Class Details" }}
                                </p>
                                <form class="forms-sample" method="POST" action="{{ route('classroom.update', $classroom) }}">

                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group">
                                        <label for="exampleInputUsername1">{{ "Class name" }}</label>
                                        <input type="text" class="form-control" name="name" placeholder="Class name" value="{{ $classroom->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ "Section" }}</label>
                                        <input type="email" class="form-control" name="section" placeholder="Section" value="{{ $classroom->section }}">
                                    </div>
                                    <button type="submit" class="text-white btn btn-primary me-2">Save</button>
                                </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">DANGER ZONE</h4>
                                <p class="card-description">
                                    {{ "The classroom will be remove from student dashboard but all data will be retain." }}
                                </p>
                                @if($classroom->archive == false)
                                    <a href="{{ route('archive-classroom', $classroom) }}" class="text-white btn btn-warning me-2">ARCHIVE CLASS</a>
                                @else
                                    <a href="{{ route('unarchive-classroom', $classroom) }}" class="text-white btn btn-warning me-2">UNARCHIVE CLASS</a>
                                @endif
                                <p class="card-description">
                                    {{ "Once your classroom is deleted, all of its resources and data will be permanently deleted after 30 days. Before deleting your classroom, please download any data or information that you wish to retain." }}
                                </p>
                                <form class="forms-sample" method="POST" action="{{ route('classroom.destroy', $classroom) }}">

                                    @csrf
                                    @method('DELETE')
                                    <input name="_method" type="hidden" value="Delete">
                                    <button type="submit" class="text-white btn btn-danger me-2 show_confirm_delete" data-toggle="tooltip" title='Delete'>DELETE CLASS</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
    <script>
        function copyToClipboard(code) {
            console.log('Test');
            navigator.clipboard.writeText(code);
        }
    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to remove this record?`,
                text: "If you remove this student, it will be gone forever in your class.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willUnenroll) => {
                if (willUnenroll) {
                form.submit();
                }
            });
        });

        $('.show_confirm_delete').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to remove this record?`,
                text: "If you delete this classroom, it will be gone forever including in your student.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                form.submit();
                }
            });
        });

        // Beta prevent duplicate submission
        $('#submit-question').click(function() {
            $(this).addClass('disabled');
        });

    </script>
@endsection
