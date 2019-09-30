<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Site\SiteController;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CitiesController extends SiteController
{
    public function getAll(Request $request)
    {
        if(!$request->get('state_id')) {
            return response()->json(['status' => false, 'message' => 'You must inform state_id']);
        }

        $cities = City
            ::where('state_id', $request->get('state_id'))
            ->all();

        return response()->json([
            'states' => $cities,
        ], 200);
    }
}
