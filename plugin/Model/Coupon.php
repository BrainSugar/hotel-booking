<?php

namespace Brainsugar\Model;

class Coupon {

        /**
         * Check if a coupon is valid.
         * Check against all the available coupons and if matched return coupon code
         * else returns false 
         * 
         * @param [String] $userCode
         * @return boolean
         */
        public function isCouponValid($userCode) {
                $this->unsetSessionCoupon();
                $couponCodes = $this->_getAllCouponCodes();
                // $response = in_array($userCode , array_column($couponCodes , 'coupon_code'));

                foreach($couponCodes as $codes)
                {                    
                        if ($codes['coupon_code'] == $userCode) {
                                $this->setSessionCoupon($codes['coupon_id']);
                                return $codes['coupon_id'];
                        }
                        else {
                                $response = false;
                        }
                } 
                return $response;
        }


        /**
         * Get all the available coupon codes.
         *
         * @return array
         */
        private function _getAllCouponCodes() {
                $posts = get_posts(
                        array(
                                'post_type' => 'bshb_coupon',
                        )
                );
                $couponCodes = [];

                foreach($posts as $post) {
                        $couponCode = get_post_meta($post->ID , 'bshb_coupon_code', true);
                        array_push($couponCodes , [
                                'coupon_id' => $post->ID ,
                                'coupon_code' => $couponCode
                        ] );
                }
                return $couponCodes;
        }


        
        public function applyDiscountToSubTotal($cartSubTotal) {
                $couponId = $this->getSessionCoupon();
                if($couponId == false){
                        $response =  false;
                }
                else {
                        $discountType = get_post_meta($couponId , 'bshb_coupon_type' , true);
                        $discount = get_post_meta($couponId , 'bshb_coupon_discount' , true);
                        if($discountType == 'percentage') {
                                $discount = $cartSubTotal * $discount/100;
                                $discountedSubTotal = $cartSubTotal - $discount;
                        }
                        else if ($discountType == 'amount') {
                                $discountedSubTotal = $cartSubTotal - $discount;
                        }
                        $response = $discountedSubTotal;
                }
                return $response;
        }

        public function getCouponMessage() {
                $couponId = $this->getSessionCoupon();
                if($couponId) {
                        $couponType = get_post_meta($couponId , 'bshb_coupon_type', true);
                        $discount = get_post_meta($couponId , 'bshb_coupon_discount' , true);
                        if($couponType == "percentage"){
                                $couponMessage = sprintf("%d%% discount applied." ,$discount);
                        }
                        else if($couponType == "amount"){
                                $discountAmount = bshb_format_currency($discount);
                                $couponMessage = sprintf("%s discount applied", $discountAmount);
                        }
                        return $couponMessage;
                }
        }

        public function getCouponCode($couponId){
                $couponCode = get_post_meta($couponId , 'bshb_coupon_code', true);
                return $couponCode;
        }

        public function setSessionCoupon($couponId) {
                $_SESSION['bshb_coupon'] = $couponId;
                if(isset($_SESSION['bshb_coupon']))
                {
                        $response = true;
                }
                return $response;
        }

        public static function unsetSessionCoupon(){     
                unset($_SESSION['bshb_coupon']);
                return true;
        }

        public static function getSessionCoupon() {
                if(isset($_SESSION['bshb_coupon']))
                {
                        $response = $_SESSION['bshb_coupon'];
                }
                else {
                        $response = false;
                }
                return $response;
        }

}