<?php

namespace Brainsugar\Http\Controllers;

class ExampleUserAgentController extends Controller
{

    public function index()
    {
        return Brainsugar()
            ->view('dashboard.useragent')
            ->withAdminStyles('brainsugar-common');
    }
}