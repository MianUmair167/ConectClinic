<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Site\SiteController;
use App\Models\State;
use Illuminate\Http\Request;

class StatesController extends SiteController
{
    public function getAll(Request $request)
    {
        return response()->json([
            'states' => State::all(),
        ], 200);
    }
}
