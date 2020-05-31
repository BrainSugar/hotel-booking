<?php
namespace Brainsugar\Admin\Validate;

class SettingsValidate extends validate{
        protected $hotelName;
        protected $hotelAddress1;
        protected $hotelAddress2;
        protected $hotelCity;
        
        public function __construct($options) {
                $this->hotelName = $options['General']['hotel_name'];
                $this->hotelAddress1 = $options['General']['hotel_address_line_1'];
                $this->hotelAddress2 = $options['General']['hotel_address_line_2'];
                $this->hotelCity = $options['General']['hotel_city'];
                
        }
        
        public function validate() {
                $this->validateHotelName();
                $this->validateHotelAddress1();
               $this->validateHotelAddress2();
               $this->validateHotelCity();
        }
        
        public function validateHotelName() {                
                if(isset($this->hotelName)){                        
                        $hotelName = sanitize_text_field( $this->hotelName );
                        Brainsugar()->options->set('General.hotel_name' , $hotelName);
                }
        }
        
        public function validateHotelAddress1() {                
                if(isset($this->hotelAddress1)){                        
                        $hotelAddress1 = sanitize_text_field( $this->hotelAddress1 );
                        Brainsugar()->options->set('General.hotel_address_line_1' , $hotelAddress1);
                }
        }
        public function validateHotelAddress2() {                
                if(isset($this->hotelAddress2)){                        
                        $hotelAddress2 = sanitize_text_field( $this->hotelAddress2 );
                        Brainsugar()->options->set('General.hotel_address_line_2' , $hotelAddress2);
                }
        }
        
        public function validateHotelCity() {                
                if(isset($this->hotelCity)){                        
                        $hotelCity = sanitize_text_field( $this->hotelCity );
                        Brainsugar()->options->set('General.hotel_city' , $hotelCity);
                }
        }
}