<?php

namespace Brainsugar\Http\Controllers\Admin;
use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Admin\Validate\SettingsValidate;
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
        public function store() {
                // $op = (array) $options;

                var_dump($this->request);
                // return $options;
        }
        
        
        public function saveSettings()
        {
                $options = $this->request->getAsOptions();
                
                if ( $this->request->verifyNonce( 'bshb-settings' ) ) {

                $validator = new SettingsValidate($options);
                $validator->validate();
                        // $hotelName = $this->request->get('General.hotel_name');

                        // if(isset($hotelName)){
                        //         $hotelName = sanitize_text_field($hotelName);
                        //         Brainsugar()->options->set('General.hotel_name' , $hotelName);
                        // }

                      
                        // Brainsugar()->options->update( $options);
                        return Brainsugar()
                        ->view('Admin.settings')            
                        ->withAdminScripts('bootstrap.bundle')
                        ->with( 'feedback', 'Options updated!' );
                        
                }
        }

        
        
        
}