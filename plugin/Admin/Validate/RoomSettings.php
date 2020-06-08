<?php 

namespace Brainsugar\Admin\Validate;

use Brainsugar\Core\World;

class RoomSettings extends Validate {
        
        protected $roomDisplayAmenities;
        protected $roomDisplayPolicies;
        protected $roomSorting;
        protected $maxRooms;
        protected $sizeUnit;


               public function __construct($options) {
                
                $this->roomDisplayAmenities = $options['display_amenities'];
                $this->roomDisplayPolicies = $options['display_policies'];
                $this->roomSorting = $options['sorting'];
                $this->maxRooms = $options['max_rooms'];
                $this->sizeUnit = $options['size_unit'];

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
                $this->validateSizeUnit();
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
        public function validateSizeUnit() {
                        if(isset($this->sizeUnit)){
                        $sizeUnit = $this->sanitizeInputs($this->sizeUnit);
                        if($sizeUnit == "") {
                                $sizeUnit = "ft";
                        }

                        Brainsugar()->options->update(['Room' => [
                                'size_unit' => $sizeUnit,
                        ],
                ],);
                }
        }



}