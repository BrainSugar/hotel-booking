<?php

namespace Brainsugar\Http\Controllers\Admin;
use Brainsugar\Http\Controllers\Controller;

class AdminController extends Controller
{

  public function index()
  {
        $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
        $cage = array("Peter"=>"lol", "Ben"=>"37", "Joe"=>"43");

$object_id = 1;
$metabox_id = 'room_settings';

cmb2_metabox_form( $metabox_id, $object_id );




        return Brainsugar()
            ->view('Admin.settings')
            ->withAdminStyles('brainsugar-common')
            ->with('age',$age)
            ->with('fie',$cmb)
            ->with('cage',$cage);

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