<?php 
namespace Brainsugar\Admin\Validate;

abstract class Validate {
        public function validate() {
                
        }       
        
        public function sanitizeInputs($value) {
                $sanitize =  sanitize_text_field($value);
                $response = \stripslashes($sanitize);
                return $response;
        }
        
}
