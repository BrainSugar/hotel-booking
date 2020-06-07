<?php
namespace Brainsugar\Admin\Validate;
use Brainsugar\Admin\Validate\GeneralSettings;

class SettingsValidate extends validate {
        // protected $hotelName;
        // protected $hotelAddress1;
        // protected $hotelAddress2;
        // protected $hotelCity;
        // protected $hotelCountry;
        // protected $hotelPostcode;
        // protected $hotelPhone;
        // protected $hotelEmail;
        // protected $hotelCurrency;
        // protected $symbolPosition;
        // protected $currencyDecimals;
        // protected $decimalSeparator;
        // protected $thousandsSeparator;
        
        public function __construct($options) {


                $generalSettings = new GeneralSettings($options['General']);
                $roomSettings = new RoomSettings($options['Room']);

                $generalSettings->validate();
                $roomSettings->validate();
        }
}
