<?php

namespace Brainsugar\Model;

class Service {

        public function getServiceId() {
                $services = get_posts(array(
                        'post_type' => 'bshb_service',
                        'fields'          => 'ids',
                        'status' => 'published'
                ));


                return $services;
        }

        private function getServiceOperation($postId) {
                $serviceOperation = get_post_meta($postId , 'bshb_service_operation', true );
                return $serviceOperation;
        }
        
        private function getStockOperation($postId) {
                $stockOperation = get_post_meta($postId , 'bshb_stock_operation', true );
                return $stockOperation;
        }

        public function getServicePrice($postId) {
                $price =  get_post_meta($postId , 'bshb_service_amount', true );
                $nights = bshb_get_stay_nights();
                $operation = $this->getServiceOperation($postId);

                if($operation == "add_to_price"){
                        return $price;
                }
                if($operation == "add_to_price_per_night"){
                        return $price * $nights;
                }
        }

        public function getServiceStock($postId) {
                $stockOperation = $this->getStockOperation($postId);
                if($stockOperation == "single") {
                        return false;
                }
                if($stockOperation == "multiple"){
                        $maxSelectable = get_post_meta($postId , 'bshb_service_max_selectable', true );
                        return $maxSelectable;
                }

        }
}