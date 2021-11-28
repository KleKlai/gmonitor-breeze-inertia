<?php

namespace App\Http\Controllers\api;

use App\Models\Question;
use App\Events\AskQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController;

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
}
