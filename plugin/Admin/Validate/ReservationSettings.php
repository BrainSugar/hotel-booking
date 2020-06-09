<?php 

namespace Brainsugar\Admin\Validate;

class ReservationSettings extends Validate {
        protected $bookingMode;
        protected $maxNights;
        protected $minNights;
        protected $advanceDays;   


               public function __construct($options) {
                
                $this->bookingMode = $options['mode'];
                $this->maxNights = $options['max_nights'];
                $this->minNights = $options['min_nights'];
                $this->advanceDays= $options['advance_days'];                
        }

        public function validate() {
                $this->validateReservationRules();
                $this->validateMode();
        }


        public function validateMode() {
                $mode = $this->sanitizeInputs($this->bookingMode);
                Brainsugar()->options->update([
                        'Reservation' => [
                                'mode' => $mode,
                        ],
                ]);

                
        }
       public function validateReservationRules() {
              $maxNights = $this->sanitizeInputs($this->maxNights);
              $minNights = $this->sanitizeInputs($this->minNights);
              $advanceDays = $this->sanitizeInputs($this->advanceDays);
              Brainsugar()->options->update([
                        'Reservation' => [
                                'rules' =>[
                                        'max_nights' => $maxNights,
                                        'min_nights' => $minNights,
                                        'advance_days' => $advanceDays,
                                ],
                        ],
                ]);
       }

}