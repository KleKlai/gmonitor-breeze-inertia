<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class AskController extends Controller
{
    public function index(Request $request)
    {

        //Validate
        $request->validate([
            'user_id'       => 'required, numeric',
            'classroom_id'  => 'required, numeric',
            'question'      => 'required, string',
            'visibility'    => 'required',
        ]);

        Question::create([
            'user_id'       => $request->user_id,
            'classroom_id'  => $request->classroom_id,
            'question'      => $request->question,
            'visibility'    => $request->visibility,
        ]);

        //Visibility choices: Publicly, Anonymousely, Privetely

        return response()->json([
            'Message'   => 'You are in the right path. (Ask Controller)',
            'Data'      => $request->all(),
        ]);
    }
}
