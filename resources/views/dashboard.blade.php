@extends('layouts.custom')

@section('body')
    @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
    @endif

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <div class="d-sm-flex justify-content-between align-items-start">
                <div>
                    <h4 class="card-title card-title-dash">Classroom List</h4>
                </div>
                    <div id="performance-line-legend">
                        <a href="{{ route('classroom.create') }}"><i class="mdi mdi-plus"></i></a>
                    </div>
                </div>
            </h4>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Name </th>
                        <th> Code </th>
                        <th> # of Student </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($classrooms as $classroom)
                        <tr>
                            <td>{{ $classroom->name }}</td>
                            <td>{{ $classroom->code }}</td>
                            <td>{{ $classroom->users_count -1 }}</td>
                            <td>
                                <a href="{{ route('open.attendance', $classroom)}}" class="btn btn-primary btn-rounded btn-fw">Open Attendance</a>
                                <a href="{{ route('classroom.show', $classroom->id) }}" class="btn btn-link">Visit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Create your first <a href="{{ route('classroom.create') }}">classroom</a></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
@endsection
