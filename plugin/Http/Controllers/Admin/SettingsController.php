<?php

namespace Brainsugar\Http\Controllers\Admin;
use Brainsugar\Http\Controllers\Controller;
use Nette\Utils\Validators;
use Nette\Utils\Html;

class SettingsController extends Controller
{
        
        public function index()
        {
                
                
                $a = Validators::isNone(0);
                var_dump($a);
                // $countries = new Countries();
                
                // $all = $countries->where('name.common', 'Brazil');
                // var_dump($all);
                // Brainsugar\Html::button( "Hello, world!" )->html();
                // var_dump(Brainsugar()->options);
                
                return Brainsugar()
                ->view('Admin.settings')            
                ->withAdminScripts('bootstrap.bundle');
                
                
        }
        // public function sanitizeForm() {
        //           if ( $this->request->verifyNonce( 'Settings' ) ) {
        //                 Brainsugar()->options->update( $this->request->getAsOptions() );
        //           }
        //           $this->saveOptions($this->request());
        // }
        
        
        public function saveOptions(Request $request)
        {
        //                       $hotelCity = $this->request->get('General/hotel_city');
        //        var_dump($this->request->get('General'));
               var_dump($request);
                
                if ( $this->request->verifyNonce( 'Settings' ) ) {
                        Brainsugar()->options->update( $this->request->getAsOptions() );
                        return Brainsugar()
                        ->view('Admin.settings')            
                        ->withAdminScripts('bootstrap.bundle')
                        ->with( 'feedback', 'Options updated!' );
                        
                }
        }
        
        
        
}