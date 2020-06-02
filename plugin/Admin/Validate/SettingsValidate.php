<?php
namespace Brainsugar\Admin\Validate;
use Brainsugar\Admin\World;

class SettingsValidate extends validate {
        protected $hotelName;
        protected $hotelAddress1;
        protected $hotelAddress2;
        protected $hotelCity;
        protected $hotelCountry;
        protected $hotelPostcode;
        protected $hotelPhone;
        protected $hotelEmail;
        protected $hotelCurrency;
        
        public function __construct($options) {
                
                $this->hotelName = $options['General']['hotel_name'];
                $this->hotelAddress1 = $options['General']['hotel_address_line_1'];
                $this->hotelAddress2 = $options['General']['hotel_address_line_2'];
                $this->hotelCity = $options['General']['hotel_city'];
                $this->hotelCountry = $options['General']['hotel_country'];
                $this->hotelPostcode = $options['General']['hotel_postcode'];
                $this->hotelPhone = $options['General']['hotel_phone'];
                $this->hotelEmail = $options['General']['hotel_email'];
                $this->hotelCurrency = $options['General']['hotel_currency'];
                
        }
        
        public function validate() {
                $this->validateHotelInfo();
                $this->validateHotelCurrency();
        }
        
        
        /**
        * Validate all the Fields from the Hotel Section
        *
        * @return void
        */        
        public function validateHotelInfo()  {
                // Check if the fields are set and sanitize the fields.
                
                // Hotel Name 
                if(isset($this->hotelName)){                        
                        $hotelName = sanitize_text_field( $this->hotelName );
                }
                
                // Address Line 1
                if(isset($this->hotelAddress1)){                        
                        $hotelAddress1 = sanitize_text_field( $this->hotelAddress1 );                        
                }
                
                // Address Line 2
                if(isset($this->hotelAddress2)){                        
                        $hotelAddress2 = sanitize_text_field( $this->hotelAddress2 );                        
                }
                
                // Hotel City
                if(isset($this->hotelCity)){                        
                        $hotelCity = sanitize_text_field( $this->hotelCity );                     
                }
                
                // Hotel Country
                if(isset($this->hotelCountry)){                        
                        $hotelCountry = sanitize_text_field( $this->hotelCountry );
                        if($hotelCountry == "Select Country"){
                                $hotelCountry = "";
                        }
                }
                
                // Hotel Postcode
                if(isset($this->hotelPostcode)){                        
                        $hotelPostcode = sanitize_text_field( $this->hotelPostcode );                       
                }
                
                // Hotel Phone                
                if(isset($this->hotelPhone)){                        
                        $hotelPhone = sanitize_text_field( $this->hotelPhone );                        
                }
                
                // Hotel Email
                if(isset($this->hotelEmail )){
                        if(is_email( $this->hotelEmail )) {
                                $hotelEmail = $this->hotelEmail;
                        } 
                        else $hotelEmail = '';
                }
                
                // Insert all the sanitized values into Wp options table.
                Brainsugar()->options->update([
                        'General' => [
                                'hotel' =>[
                                        'name' => $hotelName,
                                        'address_line_1' => $hotelAddress1,
                                        'address_line_2' => $hotelAddress2,
                                        'city' => $hotelCity,
                                        'country' => $hotelCountry,
                                        'postcode' => $hotelPostcode,
                                        'phone' => $hotelPhone,
                                        'email' => $hotelEmail,
                                ],
                        ],
                ],);
        }
        
        
        /**
        * Validate the fields from Currency Section
        *
        * @return void
        */
        public function validateHotelCurrency(){
                
                if(!empty($this->hotelCurrency)){ 
                        $hotelCurrency = sanitize_text_field( $this->hotelCurrency );
                        
                        // Check if valid Code
                        if(strlen($hotelCurrency) == 3) {                                        
                                
                                $world = new World;
                                $currencySymbol = $world->getCurrencySymbol($hotelCurrency);
                                $currencyName = $world->getCurrencyName($hotelCurrency);
                                
                                Brainsugar()->options->update([
                                        'General' => [
                                                'currency' =>[
                                                        'code' => $hotelCurrency,
                                                        'name' => $currencyName,
                                                        'symbol' => $currencySymbol,                                                
                                                ],
                                        ],
                                ],);
                        }
                }
        }
}