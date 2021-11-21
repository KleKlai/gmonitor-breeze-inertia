<?php

namespace App\Http\Controllers\api;

use App\Events\StudentAnswer;
use App\Models\Answer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController;

class AnswerController extends BaseController
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
            'user_id'       => 'required|numeric',
            'classroom_id'  => 'required|numeric',
            'question_id'   => 'required|numeric',
            'answer'        => 'required|string',
            'visibility'    => 'required',
        ]);

        $model = Answer::create([
            'user_id'       => $request->user_id,
            'classroom_id'  => $request->classroom_id,
            'question_id'   => $request->question_id,
            'answer'        => $request->answer,
            'visibility'    => $request->visibility,
        ]);

        broadcast(new StudentAnswer($model))->toOthers();

        // return response()->json([
        //     'Message'   => 'You are in the right path.',
        //     'Data'      => $request->all(),
        // ]);
        return $this->sendSuccess(
            ['answer' => $model],
            'Answer question successful'
        );
    }
}
