<?php

namespace App\Http\Controllers\Site;

use App\Models\Space;
use Illuminate\Http\Request;

class ExploreController extends SiteController
{
    public function registered()
    {
        return view("site.explore.registered");
    }

    public function messageSuccess()
    {
        return view("site.explore.message-success");
    }

    public function all(Request $request)
    {
        $spaces = Space::with('images');

        if($term = $request->get('term')) {
            $spaces->where('title', 'LIKE', "%{$term}%");
            $spaces->orWhere('full_address', 'LIKE', "%{$term}%");
        }

        $spaces = $spaces->paginate(12);

        return view("site.explore.all", [
            "spaces" => $spaces,
        ]);
    }

    public function view($spaceId, $slug = '')
    {
        $space = Space::find($spaceId);

        return view("site.explore.view", [
            "space" => $space,
        ]);
    }
}
