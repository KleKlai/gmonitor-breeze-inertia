<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function index(Request $request)
    {

        //Save answer to database
        // Data need to be saved in database
        // 1. User_id
        // 2. Classroom_Id - where is the question raised from?
        // 3. Question_Id - On what question does this answer belong?
        // 4. Answer - answer of student
        // 5. visibility - it is anyone,

        // Validation
        $request->validate([
            'user_id'       => 'required, numeric',
            'classroom_id'  => 'required, numeric',
            'question_id'   => 'required, numeric',
            'answer'        => 'required, string',
            'visibility'    => 'required',
        ]);

        Answer::create([
            'user_id'       => $request->user,
            'classroom_id'  => $request->classroom,
            'question_id'   => $request->question,
            'answer'        => $request->answer,
            'visibility'    => $request->visibility,
        ]);

        return response()->json([
            'Message'   => 'You are in the right path.',
            'Data'      => $request->all(),
        ]);
    }
}
