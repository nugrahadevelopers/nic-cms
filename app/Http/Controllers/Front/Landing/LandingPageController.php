<?php

namespace App\Http\Controllers\Front\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        if (config('app.env') == 'production') {
            return redirect()->route('front.blog.index');
        } else {
            return view('front.landing.index');
        }
    }
}
