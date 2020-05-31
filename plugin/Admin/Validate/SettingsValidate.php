<?php
namespace Brainsugar\Admin\Validate;

class SettingsValidate {
        protected $hotelName;


        public function __construct($options) {
                $this->hotelName = $options['General']['hotel_name'];
        }

        public function validate() {
                if(isset($this->hotelName)){
                                $hotelName = sanitize_text_field($this->hotelName);
                                Brainsugar()->options->set('General.hotel_name' , $hotelName);
                        }

        }
}