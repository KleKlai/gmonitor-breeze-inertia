<?php

namespace App\Http\Controllers\API;

use Auth;
use App\Models\User;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class SearchController extends BaseController
{
    public function searchClassroom(Request $request)
    {
        // User can search classroom where she is currently enroll in

        // $classroom = Classroom::where('name', 'LIKE', "%{$request->name}%")->get();

        $validator = Validator::make($request->all(), array(
            'name' => 'required|string',
        ));

        if($validator->fails()) {
            // return response()->json(['Message' => $validator->errors()]);
            return $this->sendError(
                'Search classrooms failed',
                $validator->errors()
            );
        }

        $classrooms = Classroom::whereHas('users', function ($query) use ($request){
            return $query->where('users.id', auth()->user()->id)->where('classrooms.name', 'LIKE', "%{$request->name}%");
        })->get();


        // return response()->json([
        //     "Status"    => "OK",
        //     "Message"   => "Success",
        //     "Result"    => $classroom
        // ]);
        return $this->sendSuccess(
            ['classrooms' => $classrooms],
            'Search classrooms successful'
        );
    }
}
