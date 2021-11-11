<?php

namespace App\Http\Controllers\API;

use App\Models\Classroom;
use App\Http\Controllers\API\BaseController;

class ClassroomController extends BaseController
{
    public function index()
    {
        $data = Classroom::archive(false)->whereHas('users', function ($query) {
            return $query->where('users.id', auth()->user()->id);
        })->get();

        return $this->sendSuccess(
            ['classrooms' => $data],
            'Classroom list fetched successful'
        );
    }
}
