<?php

namespace App\Http\Controllers\Site;

class HomeController extends SiteController
{
    public function home() {
        return view("site.home.home");
    }

    public function registered() {
        return view("site.home.registered");
    }
}
