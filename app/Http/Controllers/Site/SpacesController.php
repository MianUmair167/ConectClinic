<?php

namespace App\Http\Controllers\Site;

class SpacesController extends SiteController
{
    public function create() {
        return view("site.spaces.create");
    }

    public function success() {
        return view("site.spaces.success");
    }

}
