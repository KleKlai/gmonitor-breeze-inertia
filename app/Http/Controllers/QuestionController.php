<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Question;
use App\Models\Classroom;
use App\Events\NewQuestion;
use App\Events\QuestionNew;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
    public function store(Classroom $classroom, Request $request)
    {
        if($classroom->is_open != true)
        {
            \Session::flash('error', 'Attendance is close.');
            return redirect()->back();
        }

        $request->validate([
            'question'      => 'required',
            'answer_by'     => 'required'
        ]);

        $model = Question::create([
            'user_id'       =>  Auth::user()->id,
            'classroom_id'  =>  $classroom->id,
            'question'      =>  $request->question,
            'answer_by'     =>  $request->answer_by,
            'visibility'    =>  'Public',
        ]);

        \Session::flash('success', 'Question sent successfully');

        broadcast(new NewQuestion($model))->toOthers();
        broadcast(new QuestionNew($model))->toOthers();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
