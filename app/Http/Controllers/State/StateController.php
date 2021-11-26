<?php

namespace App\Http\Controllers\State;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function forbiden403()
    {
        return view('state.403');
    }
}
