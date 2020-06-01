<?php

namespace Brainsugar\Http\Controllers\Admin;
use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Admin\Validate\SettingsValidate;
use Brainsugar\Admin\World;


class SettingsController extends Controller
{
        
        public function index()
        {
                
                
                $world = new World;
                $countries = $world->getCountries();
                $currencies = $world->getCurrencies();
                
                return Brainsugar()
                ->view('Admin.settings')            
                ->withAdminScripts('bootstrap.bundle')
                ->with('countries', $countries);
                
                
        }

        public function saveSettings()
        {
                $options = $this->request->getAsOptions();
                
                if ( $this->request->verifyNonce( 'bshb-settings' ) ) {
                        
                        $validator = new SettingsValidate($options);
                        $validator->validate(); 
                        return $this->index()->with('feedback' , 'Options updated'); 
                }
        }
        
}