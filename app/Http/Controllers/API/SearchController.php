<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function searchClassroom(Request $request)
    {
        // User can search classroom where she is currently enroll in

        // $classroom = Classroom::where('name', 'LIKE', "%{$request->name}%")->get();

        $validator = Validator::make($request->all(), array(
            'name'     => 'required|string',
        ));

        if($validator->fails()) {
            return response()->json(['Message' => $validator->errors()]);
        }

        $classroom = Classroom::whereHas('users', function ($query) use ($request){
            return $query->where('users.id', auth()->user()->id)->where('classrooms.name', 'LIKE', "%{$request->name}%");
        })->get();


        return response()->json([
            "Status"    => "OK",
            "Message"   => "Success",
            "Result"    => $classroom
        ]);
    }
}
