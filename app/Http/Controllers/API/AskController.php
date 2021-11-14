<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AskController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'Message'   => 'You are in the right path. (Ask Controller)',
            'Data'      => $request->all(),
        ]);
    }
}
