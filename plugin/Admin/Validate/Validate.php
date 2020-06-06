<?php 
namespace Brainsugar\Admin\Validate;

abstract class Validate {
        public function validate() {
                
        }
        public function sanitizeInputs($value) {
                sanitize_text_field( $value);
                $result = \stripslashes($value);
                return $result;
        }
}
