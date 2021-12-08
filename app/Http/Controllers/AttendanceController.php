<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classroom;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    public function openAttendance(Classroom $classroom)
    {
        //Update classroom so it can reflect on UI
        $classroom->update([
            'is_open'   => ($classroom->is_open == false) ? true : false,
        ]);

        //Create Attendance
        Attendance::create([
            'user_id'       => \Auth::user()->id,
            'classroom_id'  => $classroom->id,
            'is_open'       => true,
        ]);

        \Session::flash('success', 'Attendance has been opened');

        return redirect()->back();
    }

    public function closeAttendance(Classroom $classroom)
    {
        // Find Attendance for the current classroom and look for who is status is_open is true
        $attendance = Attendance::where('classroom_id', $classroom->id)->where('is_open', true)->first();

        //Update classroom status so it can reflect on UI
        $classroom->update([
            'is_open' => false,
        ]);

        //Update attendance table set it to true
        $attendance->update([
            'is_open' => false,
        ]);

        \Session::flash('error', 'Attendance has been closed');

        return redirect()->back();
    }

    public function attendanceList(Classroom $classroom)
    {
        $attendances = Attendance::with('users')->whereClassroomId($classroom->id)->get();

        return view('classroom.test', compact('attendances'));
    }

    public function attendanceUser(Attendance $attendance)
    {
        return view('classroom.attendance.attendance-user', compact('attendance'));
    }
}
