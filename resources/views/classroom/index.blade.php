 <x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Classroom') }}
        </h2>
    </x-slot>

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
                        <a class="nav-link border-0" id="settings-tab" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a>
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
                                        <th> Gender </th>
                                        <th> Attendance</th>
                                        <th> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($students as $student)
                                            <tr>
                                                <td>{{ $student->name }}</td>
                                                <td>Male</td>
                                                <td>36</td>
                                                <td>
                                                    <a href="{{ route('unenroll.student', [$classroom, $student]) }}" class="btn btn-outline-secondary btn-rounded btn-icon">
                                                        <i class="icon-ban text-success"></i>
                                                    </a>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <div class="row">
                                                <div class="col">
                                                    Ask questions to your students
                                                </div>
                                            </div>
                                        </h4>
                                        <form class="forms-sample" action="{{ route('ask.question', $classroom) }}" method="POST">
                                            @csrf

                                            <div class="form-group">
                                                <label for="Name">Question</label>
                                                <input type="text" class="form-control" name="question" placeholder="Question" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Answer By</label>
                                                <select class="form-control" name="answer_by" required>
                                                    <option value="yes/no">Yes/No</option>
                                                    <option value="enum">Enumeration</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="live-answers" role="tabpanel" aria-labelledby="live-answers">
                        <div class="row">
                            <div class="col-sm-12">
                            <div class="statistics-details d-flex align-items-center justify-content-between">
                                <div>
                                <p class="statistics-title">Bounce Rate</p>
                                <h3 class="rate-percentage">32.53%</h3>
                                <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                                </div>
                                <div>
                                <p class="statistics-title">Page Views</p>
                                <h3 class="rate-percentage">7,682</h3>
                                <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                                </div>
                                <div>
                                <p class="statistics-title">New Sessions</p>
                                <h3 class="rate-percentage">68.8</h3>
                                <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                                </div>
                                <div class="d-none d-md-block">
                                <p class="statistics-title">Avg. Time on Site</p>
                                <h3 class="rate-percentage">2m:35s</h3>
                                <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                                </div>
                                <div class="d-none d-md-block">
                                <p class="statistics-title">New Sessions</p>
                                <h3 class="rate-percentage">68.8</h3>
                                <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                                </div>
                                <div class="d-none d-md-block">
                                <p class="statistics-title">Avg. Time on Site</p>
                                <h3 class="rate-percentage">2m:35s</h3>
                                <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="share-access" role="tabpanel" aria-labelledby="share-access">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-lg-8 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-12 grid-margin stretch-card">
                                            <div class="card card-rounded table-darkBGImg">
                                            <div class="card-body">
                                                <div class="col-sm-8">
                                                <h3 class="text-white upgrade-info mb-0">
                                                    Share your <span class="fw-bold">Code</span> for better outreach
                                                </h3>
                                                <button value="{{ $classroom->code }}" id="classcode" onclick="copyToClipboard('{{ $classroom->code }}')" class="btn btn-info upgrade-btn">{{ $classroom->code }}</a>
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
                                        <button type="submit" class="btn btn-primary me-2 text-white">Save</button>
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
                                        <a href="{{ route('archive-classroom', $classroom) }}" class="btn btn-warning me-2 text-white">ARCHIVE CLASS</a>
                                    @else
                                        <a href="{{ route('unarchive-classroom', $classroom) }}" class="btn btn-warning me-2 text-white">UNARCHIVE CLASS</a>
                                    @endif
                                    <p class="card-description">
                                        {{ "Once your classroom is deleted, all of its resources and data will be permanently deleted after 30 days. Before deleting your classroom, please download any data or information that you wish to retain." }}
                                    </p>
                                    <form class="forms-sample" method="POST" action="{{ route('classroom.destroy', $classroom) }}">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger me-2 text-white">DELETE CLASS</button>
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

    @section('script')
        <script>
            function copyToClipboard(code) {
                navigator.clipboard.writeText(code);
            }
        </script>
    @endsection
</x-custom-layout>
