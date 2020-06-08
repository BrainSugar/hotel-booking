<?php 

namespace Brainsugar\Admin\Validate;

use Brainsugar\Core\World;

class RoomSettings extends Validate {
        
        protected $roomDisplayAmenities;
        protected $roomDisplayPolicies;
        protected $roomSorting;
        protected $maxRooms;


               public function __construct($options) {
                
                $this->roomDisplayAmenities = $options['display_amenities'];
                $this->roomDisplayPolicies = $options['display_policies'];
                $this->roomSorting = $options['sorting'];
                $this->maxRooms = $options['max_rooms'];
                // $this->hotelCity = $options['hotel_city'];
                // $this->hotelCountry = $options['hotel_country'];
                // $this->hotelPostcode = $options['hotel_postcode'];
                // $this->hotelPhone = $options['hotel_phone'];
                // $this->hotelEmail = $options['hotel_email'];
                // $this->hotelCurrency = $options['hotel_currency'];
                // $this->symbolPosition = $options['symbol_position'];
                // $this->currencyDecimals = $options['currency_decimals'];
                // $this->decimalSeparator= $options['decimal_separator'];
                // $this->thousandsSeparator = $options['thousands_separator'];

               }

                public function sanitizeInputs($value) {
                        $sanitize =  sanitize_text_field($value);
                        $response = \stripslashes($sanitize);
                return $response;
        }

        
        public function validate() {
                $this->validateDisplayOptions();
                $this->validateMaxRooms();
        }
        
        
        /**
        * Validate all the Fields from the Room Display Section
        *
        * @return void
        */        
        public function validateDisplayOptions()  {
                // Check if the fields are set and sanitize the fields.
                
                // Hotel Name 
                if(isset($this->roomDisplayAmenities)){
                        $displayAmenities = $this->sanitizeInputs( $this->roomDisplayAmenities );
                        if($displayAmenities == 'true'){
                                $displayAmenities = 'true';
                        }
                        else{
                                $displayAmenities = 'false';
                        }
                }
                
                // Address Line 1
                if(isset($this->roomDisplayPolicies)){
                        $displayPolicies = $this->sanitizeInputs( $this->roomDisplayPolicies ); 
                        if($displayPolicies == 'true'){
                                $displayPolicies = 'true';
                        }
                        else{
                                $displayPolicies = 'false';
                        }
                }

                                // Address Line 1
                if(isset($this->roomSorting)){
                        $roomSorting = $this->sanitizeInputs( $this->roomSorting );                        
                }

                
            
                
                // Insert all the sanitized values into Wp options table.
                Brainsugar()->options->update([
                        'Room' => [
                                'display' =>[
                                        'display_amenities' => $displayAmenities,
                                        'display_policies' => $displayPolicies,
                                        'sorting' => $roomSorting,
                                ],
                        ],
                ],);                
        }

        public function validateMaxRooms() {
                        if(isset($this->maxRooms)){
                        $maxRooms = absint( $this->maxRooms );
                        Brainsugar()->options->update(['Room' => [
                                'max_rooms' => $maxRooms,
                        ],
                ],);
                }

        }
        
        
        // /**
        // * Validate the fields from Currency Section
        // *
        // * @return void
        // */
        // public function validateHotelCurrency(){
                
        //         if(isset($this->hotelCurrency)){ 
        //                 $hotelCurrency = $this->sanitizeInputs( $this->hotelCurrency );
                        
        //                 // Check if valid Code
        //                 if(strlen($hotelCurrency) == 3) {                                        
                                
        //                         $world = new World;
        //                         $currencySymbol = $world->getCurrencySymbol($hotelCurrency);
        //                         $currencyName = $world->getCurrencyName($hotelCurrency);
                                
        //                 }
        //                 else {
        //                         $currencySymbol = '';
        //                         $currencyName = '';
        //                 }
        //         }
                
        //         if(isset($this->symbolPosition)){
        //                 if($this->symbolPosition == 'before'){
        //                         $symbolPosition = 'before';
        //                 }
        //                 else {
        //                         $symbolPosition = 'after';
        //                 }
        //         }
                
                
                
        //         if(isset($this->currencyDecimals)){
        //                 $decimals = absint($this->currencyDecimals);
        //         }

        //         if(isset($this->decimalSeparator)) {                         
        //                         $decimalSeparator = $this->sanitizeInputs($this->decimalSeparator);                   
        //         }

        //        if(isset($this->thousandsSeparator)) {                      
        //                         $thousandsSeparator = $this->sanitizeInputs($this->thousandsSeparator);                     
        //         }
                
                
        //         Brainsugar()->options->update([
        //                 'General' => [
        //                         'currency' =>[
        //                                 'code' => $hotelCurrency,
        //                                 'name' => $currencyName,
        //                                 'symbol' => $currencySymbol,
        //                                 'symbol_position' => $symbolPosition,
        //                                 'decimals' => $decimals,
        //                                 'decimal_separator' => $decimalSeparator,
        //                                 'thousands_separator' => $thousandsSeparator,
        //                         ],
        //                 ],
        //         ],);                                        
        // }

        
}