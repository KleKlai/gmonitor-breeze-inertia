<?php

namespace App\Http\Controllers\api;

use App\Models\Question;
use App\Models\Answer;
use App\Models\Classroom;
use App\Events\AskQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// use Auth;

class AskController extends BaseController
{
    public function index(Request $request)
    {

        //Validate
        $request->validate([
            'user_id'       => 'required|numeric',
            'classroom_id'  => 'required|numeric',
            'question'      => 'required|string',
            'visibility'    => 'required',
        ]);

        $model = Question::create([
            'user_id'       => $request->user_id,
            'classroom_id'  => $request->classroom_id,
            'question'      => $request->question,
            'visibility'    => $request->visibility,
        ]);

        //Visibility choices: Publicly, Anonymousely, Privetely

        $model->user = $model->user;

        broadcast(new AskQuestion($model))->toOthers();

        // return response()->json([
        //     'Message'   => 'You are in the right path. (Ask Controller)',
        //     'Data'      => $request->all(),
        // ]);
        return $this->sendSuccess(
            ['ask' => $model],
            'Ask question successful'
        );
    }

    public function latestQuestion(Request $request)
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

        $question   = Question::whereClassroomId($classroom->id)->where('answer_by', '!=', null)->latest('id')->first();

        if($question == null){
            return response()->json([
                "Status"    => "OK",
                "Message"   => "Classroom doesn't have any question yet.",
            ]);
        }

        $answer     = Answer::whereQuestionId($question->id)->whereUserId(Auth::user()->id)->first();

        // If the answer eloquent empty which means the user is not yet answer.
        // return the user has not yet answer
        if(empty($answer))
        {
            return response()->json([
                "is_answer" => false,
                "Question"  => $question,
            ]);
        }

        return response()->json([
            "is_answer" => true,
        ]);
    }
}
