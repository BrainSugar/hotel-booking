<?php

namespace Brainsugar\Http\Controllers\Admin;
use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Admin\Validate\SettingsValidate;
use Brainsugar\Core\World;
use Brainsugar\Core\CoreFunctions;



class SettingsController extends Controller
{
        
        public function index()
        {
                
                
                $world = new World;
                $countries = $world->getCountries();
                $currencies = $world->getCurrencies();     
                $currenciename = $world->getCurrencyName('INR');
                $currencyDisplay = CoreFunctions::formatCurrency('100000');
                $pages = get_pages(array('post_status' => 'publish'));
                
                
                return Brainsugar()
                ->view('Admin.settings')            
                ->withAdminScripts('bootstrap.bundle')
                ->with('countries', $countries)
                ->with('currencies', $currencies)
                ->with('currencyDisplay', $currencyDisplay)
                ->with('pages', $pages);

                
                
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