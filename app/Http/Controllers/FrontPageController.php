<?php

namespace App\Http\Controllers;

class FrontPageController extends Controller
{
    public function __invoke()
    {
        return view('pages.frontpage');
    }
}
