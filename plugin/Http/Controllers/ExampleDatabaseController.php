<?php

namespace Brainsugar\Http\Controllers;

class ExampleDatabaseController extends Controller
{
    public function index()
    {

        return Brainsugar()
            ->view('dashboard.database')
            ->withAdminStyles('brainsugar-common');
    }

}
