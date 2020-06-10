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
                $this->validateReservationSettings();               
        }
        
        
        public function validateReservationSettings() {
                if(isset($this->bookingMode)){
                        $mode =  $this->sanitizeInputs($this->bookingMode);
                }
                
                if(isset($this->maxNights)){
                        $maxNights = absint($this->maxNights);
                }
                
                if(isset($this->minNights)){
                        $minNights = absint($this->minNights);
                }
                
                if(isset($this->advanceDays)){
                        $advanceDays = absint($this->advanceDays);
                }
                
                Brainsugar()->options->update([
                        'Reservation' => [
                                'mode' => $mode,
                                'rules' =>[
                                        'max_nights' => $maxNights,
                                        'min_nights' => $minNights,
                                        'advance_days' => $advanceDays,
                                ],
                        ],
                        ]);
                }
                
        }