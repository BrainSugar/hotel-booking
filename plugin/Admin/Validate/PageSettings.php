<?php 

namespace Brainsugar\Admin\Validate;

class PageSettings extends Validate {
        protected $searchPage;

        
        
        public function __construct($options) {
                
                $this->searchPage = $options['search'];

        }
        
        public function validate() {
                $this->validatePageSettings();               
        }
        
        
        public function validatePageSettings() {
                if(isset($this->searchPage)){
                        $searchPage = absint($this->searchPage);
                }           
                
                Brainsugar()->options->update([
                        'Pages' => [
                                'search' => $searchPage,
                        ],
                        ]);
                }
                
        }