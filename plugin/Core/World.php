<?php 
namespace Brainsugar\Core;

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
                                foreach($value['currencies'] as $key => $value){
                                        array_push($currencies , array(
                                        'name' => $value['name'] , 
                                        'symbol' => $value['symbol'],
                                        'code' =>$key));
                                }
                        }  
                } 
                $currency = array_unique($currencies , SORT_REGULAR);
                return $currency;
        }
        
        public function getCurrencySymbol($currencyCode) {
                $currencies = $this->getCurrencies();
                foreach($currencies as $currency)
                {
                        if($currency['code'] == $currencyCode){
                                $currencySymbol = $currency['symbol'];
                        }
                }
                return $currencySymbol;
        }

        public function getCurrencyName($currencyCode) {
                $currencies = $this->getCurrencies();
                foreach($currencies as $currency)
                {
                        if($currency['code'] == $currencyCode){
                                $currencyName = $currency['name'];
                        }
                }
                return $currencyName;
        }

}

        
