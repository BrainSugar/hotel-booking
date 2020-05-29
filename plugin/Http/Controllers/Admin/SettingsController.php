<?php

namespace Brainsugar\Http\Controllers\Admin;
use Brainsugar\Http\Controllers\Controller;
// use Nette\Utils\Validators;

class SettingsController extends Controller
{

  public function index()
  {
        
        // $a = Validators::isNone(0);
        // var_dump($a);
// $countries = new Countries();

// $all = $countries->where('name.common', 'Brazil');
// var_dump($all);
// Brainsugar\Html::button( "Hello, world!" )->html();
// var_dump(Brainsugar()->options);

        return Brainsugar()
            ->view('Admin.settings')            
            ->withAdminScripts('bootstrap.bundle')
               ->with( 'feedback', 'Options updated!' );
  }

  
  public function saveOptions()
  {

if ( $this->request->verifyNonce( 'Settings' ) ) {
         Brainsugar()->options->update( $this->request->getAsOptions() );
        return Brainsugar()
            ->view('Admin.settings')            
            ->withAdminScripts('bootstrap.bundle')
               ->with( 'feedback', 'Options updated!' );
  
}
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