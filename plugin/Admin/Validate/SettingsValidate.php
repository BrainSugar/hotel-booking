<?php
namespace Brainsugar\Admin\Validate;
// use Brainsugar\Admin\Validate\GeneralSettings;
// use Brainsugar\Admin\Validate\RoomSettings;
// use Brainsugar\Admin\Validate\ReservationSettings;

class SettingsValidate extends Validate {

        
        public function __construct($options) {


                $generalSettings = new GeneralSettings($options['General']);
                $roomSettings = new RoomSettings($options['Room']);
                $reservationSettings = new ReservationSettings($options['Reservation']);

                $generalSettings->validate();
                $roomSettings->validate();
                $reservationSettings->validate();
        }
}
