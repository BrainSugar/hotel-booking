<?php

namespace Brainsugar\Model;

class Tax {
        
        public function calculateTaxRates($cartSubTotal) {

                // Get all tax rates
                        $taxRates = $this->_getTaxes();

                        $taxData = [];
                        $taxes = [];

                        if(!empty($taxRates)) {

                                foreach($taxRates as $rate){
                                        $taxRate = get_post_meta( $rate->ID , '_bshb_tax_percentage' , true);
                                        $tax = $cartSubTotal * $taxRate/100;
                                        array_push($taxes , $tax);
                                        
                                        array_push($taxData , [
                                                'tax_name' => $rate->post_title,
                                                'tax_rate' => $taxRate . '%',
                                                'tax' => $tax
                                                ]);                       
                                        }
                                        
                                        $totalTax = array_sum($taxes);
                                        $total = $cartSubTotal + $totalTax;
                                        $response = [
                                                'tax_data' => $taxData, 
                                                'total' => $total
                                        ];
                        }
                        else {
                                $response = false;
                        }
                return $response;
        }

        private function _getTaxes() {
                $response = get_posts(
                        array(                                
                                'post_type' => 'bshb_tax',                                
                                )
                        );
                return $response;
        }
}

