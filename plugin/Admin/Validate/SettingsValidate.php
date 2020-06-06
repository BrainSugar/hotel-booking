<?php
namespace Brainsugar\Admin\Validate;
use Brainsugar\Core\World;

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
        protected $symbolPosition;
        protected $currencyDecimals;
        protected $decimalSeparator;
        protected $thousandsSeparator;
        
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
                $this->symbolPosition = $options['General']['symbol_position'];
                $this->currencyDecimals = $options['General']['currency_decimals'];
                $this->decimalSeparator= $options['General']['decimal_separator'];
                $this->thousandsSeparator = $options['General']['thousands_separator'];
                
                
        }

        public function sanitizeInputs($value) {
               $sanitize =  sanitize_text_field($value);
                $response = \stripslashes($sanitize);
                return $response;
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
                        $hotelName = $this->sanitizeInputs( $this->hotelName );
                }
                
                // Address Line 1
                if(isset($this->hotelAddress1)){
                        $hotelAddress1 = $this->sanitizeInputs( $this->hotelAddress1 );                        
                }
                
                // Address Line 2
                if(isset($this->hotelAddress2)){                        
                        $hotelAddress2 = $this->sanitizeInputs( $this->hotelAddress2 ); 
                }
                
                // Hotel City
                if(isset($this->hotelCity)){                        
                        $hotelCity = $this->sanitizeInputs( $this->hotelCity ); 
                }
                
                // Hotel Country
                if(isset($this->hotelCountry)){                        
                        $hotelCountry = $this->sanitizeInputs( $this->hotelCountry );
                        if($hotelCountry == "Select Country"){
                                $hotelCountry = "";
                        }
                }
                
                // Hotel Postcode
                if(isset($this->hotelPostcode)){                        
                        $hotelPostcode = $this->sanitizeInputs( $this->hotelPostcode );                       
                }
                
                // Hotel Phone                
                if(isset($this->hotelPhone)){                        
                        $hotelPhone = $this->sanitizeInputs( $this->hotelPhone );                        
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
                
                if(isset($this->hotelCurrency)){ 
                        $hotelCurrency = $this->sanitizeInputs( $this->hotelCurrency );
                        
                        // Check if valid Code
                        if(strlen($hotelCurrency) == 3) {                                        
                                
                                $world = new World;
                                $currencySymbol = $world->getCurrencySymbol($hotelCurrency);
                                $currencyName = $world->getCurrencyName($hotelCurrency);
                                
                        }
                        else {
                                $currencySymbol = '';
                                $currencyName = '';
                        }
                }
                
                if(isset($this->symbolPosition)){
                        if($this->symbolPosition == 'before'){
                                $symbolPosition = 'before';
                        }
                        else {
                                $symbolPosition = 'after';
                        }
                }
                
                
                
                if(isset($this->currencyDecimals)){
                        $decimals = absint($this->currencyDecimals);
                }

                if(isset($this->decimalSeparator)) {                         
                                $decimalSeparator = $this->sanitizeInputs($this->decimalSeparator);                   
                }

               if(isset($this->thousandsSeparator)) {                      
                                $thousandsSeparator = $this->sanitizeInputs($this->thousandsSeparator);                     
                }
                
                
                Brainsugar()->options->update([
                        'General' => [
                                'currency' =>[
                                        'code' => $hotelCurrency,
                                        'name' => $currencyName,
                                        'symbol' => $currencySymbol,
                                        'symbol_position' => $symbolPosition,
                                        'decimals' => $decimals,
                                        'decimal_separator' => $decimalSeparator,
                                        'thousands_separator' => $thousandsSeparator,
                                ],
                        ],
                ],);                                        
        }
}