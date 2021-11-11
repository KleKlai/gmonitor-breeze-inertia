<?php

namespace App\Http\Controllers\API;

use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class JoinController extends BaseController
{
    public function joinClassroom(Request $request)
    {
        $validator = Validator::make($request->all(), array(
            'code'     => 'required|string',
        ));

        if($validator->fails()) {
            return $this->sendError(
                'Joining a classroom failed',
                $validator->errors()
            );
        }

        $classroom = Classroom::where('code', $request->code)->first();

        if($classroom == null){
            return $this->sendError(
                'Classroom doesn\'t exist'
            );
        }

        if($classroom->users->contains(Auth()->user()))
        {
            return $this->sendSuccess(
                null,
                'Already enrolled on classroom '. $classroom->name
            );
        }

        $classroom->users()->syncWithoutDetaching(Auth()->user(), ['is_teacher' => false]);

        return $this->sendSuccess(
            ['classroom' => $classroom],
            'joining a classroom successful'
        );
    }
}
