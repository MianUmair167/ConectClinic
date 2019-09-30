<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Site\SiteController;
use App\Models\Space;
use Illuminate\Http\Request;

class SpacesController extends SiteController
{
    /**
     * Create space
     */
    public function create(Request $request)
    {



        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'full_address' => 'required',
            'terms' => 'required',
        ]);

        $space = $request->all();


//      return $space['amenities'];

        if(!isset($space['lat']))
            $space['lat'] = 0;

        if(!isset($space['lng']))
            $space['lng'] = 0;

        if(isset($space['hour_preference']))
            $space['hour_preference'] = json_encode($space['hour_preference']);

        //User ID
        $space['user_id'] = auth()->user()->id;

        $space1 = New Space;

        if(!$check = $space1->create($space)) {
            return response()->setStatusCode(400);
        }

        if($space['amenities']){
            for($x=0 ; $x<count($space['amenities']); $x++)
            {
                $check->Amenities()->attach($space['amenities'][$x]);
            }
        }



        return response()->json([
            'status' => true,
        ], 200);
    }


}
