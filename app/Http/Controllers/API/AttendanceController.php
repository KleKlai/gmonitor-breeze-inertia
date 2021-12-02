<?php

namespace App\Http\Controllers\API;

use App\Models\Classroom;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function recordAttendance(Request $request)
    {
        $validator = Validator::make($request->all(), array(
            'code'     => 'required|string',
        ));

        if($validator->fails()) {
            return response()->json(['Message' => $validator->errors()]);
        }

        //Find the classroom
        $classroom = Classroom::firstWhere('code', $request->code);

        //Catch the error here if the classroom doesn't exist
        if($classroom == null){
            return response()->json([
                "Status"    => "OK",
                "Message"   => "Classroom doesn't exist",
            ]);
        }

        //Validate if the current classroom is mark as open for attendance
        if($classroom->is_open == false){
            return response()->json([
                "Status"    => "OK",
                "Message"   => "Classroom attendance is close."
            ]);
        }

        //Validate if the user enrolled in the current classroom?
        if(!$classroom->students->contains(Auth::user()->id) == Auth::user()->id)
        {
            return response()->json([
                "Status"    => "OK",
                "Message"   => "Unauthorized, You are not enroll in this class",
            ]);
        }

        //Get the classroom attendance model
        $attendance = Attendance::where('classroom_id', $classroom->id)->where('is_open', true)->first();

        //validate if the user already has attendance
        if($attendance->users->contains(Auth::user()))
        {
            //If user has already attendance
            return response()->json([
                "Status"        => "OK",
                "Attendance"    => true,
                "User"          => Auth::user(),
            ]);
        }

        //Carbon Functions
        // eq() equals
        // ne() not equals
        // gt() greater than
        // gte() greater than or equals
        // lt() less than
        // lte() less than or equals

        //if the attendance of student is 15mins late mark as late
        if($attendance->created_at->addMinute(15)->lte(Carbon::now()))
        {
            //Attach the current login user to the attendance with parameters "Status" and "is_student"
            $attendance->users()->attach(Auth::user(), ['status' => 'Late']);
        } else {
            //Attach the current login user to the attendance with parameters "Status" and "is_student"
            $attendance->users()->attach(Auth::user(), ['status' => 'Present']);
        }

        return response()->json([
            "Status"    => "OK",
            "Message"   => "Attendance has been record.",
        ]);
    }

    public function validateAttendance(Request $request)
    {
        //return true or false if student already has attendance
        $validator = Validator::make($request->all(), array(
            'code'     => 'required|string',
        ));

        if($validator->fails()) {
            return response()->json(['Message' => $validator->errors()]);
        }

        //Find the classroom
        $classroom = Classroom::firstWhere('code', $request->code);

        //Catch the error here if the classroom doesn't exist
        if($classroom == null){
            return response()->json([
                "Status"    => "OK",
                "Message"   => "Classroom doesn't exist",
            ]);
        }

        //Validate if the current classroom is mark as open for attendance
        if($classroom->is_open == false){
            return response()->json([
                "Status"    => "OK",
                "Message"   => "Classroom attendance is close."
            ]);
        }

        //Validate if the user enrolled in the current classroom?
        if(!$classroom->students->contains(Auth::user()->id) == Auth::user()->id)
        {
            return response()->json([
                "Status"    => "OK",
                "Message"   => "Unauthorized, You are not enroll in this class",
            ]);
        }

        //Get the classroom attendance model
        // $attendance = $classroom->attendances->get();

        $attendance = Attendance::where('classroom_id', $classroom->id)->where('is_open', true)->first();

        //validate if the user already has attendance
        if($attendance->users->contains(Auth::user()))
        {
            return response()->json([
                "Status"        => "OK",
                "Attendance"    => true,
                "User"          => Auth::user(),
            ]);
        }

        return response()->json([
            "Status"        => "OK",
            "Attendance"    => false,
            "User"          => Auth::user(),
        ]);
    }
}
