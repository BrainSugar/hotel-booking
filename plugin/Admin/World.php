<?php 
namespace Brainsugar\Admin;

class World {
        
        protected $worldData;        
        
        public function __construct() {
                $this->worldData = json_decode(file_get_contents(WP_PLUGIN_DIR . '/brainsugar-hotel-booking/resources/assets/js/countries.json' ), true);
        }


        public function getCountries() {
                $countries = array();
                if(isset($this->worldData)) {
                        foreach($this->worldData as $key => $value) {
                                array_push($countries , $value['name']['common']);                        
                        }
                }
                return $countries;
        }
        public function getCurrencies() {
                $currencies = array();
                      if(isset($this->worldData)) {
                        foreach($this->worldData as $key => $value) {
                                array_push($currencies , $value['currencies']);
                        }
                }
                return $currencies;

        }
}