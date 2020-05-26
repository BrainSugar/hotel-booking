<?php

namespace Brainsugar\Http\Controllers\Admin;
use Brainsugar\Http\Controllers\Controller;

class SettingsController extends Controller
{

  public function index()
  {
        return Brainsugar()
            ->view('Admin.settings')            
            ->withAdminScripts('bootstrap.bundle');
  }

  public function store()
  {
    // POST
  }

  public function update()
  {
    // PUT AND PATCH
  }

  public function destroy()
  {
    // DELETE
  }

}