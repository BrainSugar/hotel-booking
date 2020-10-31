<?php

namespace Brainsugar\Http\Controllers\Frontend;

use Brainsugar\Providers\SessionServiceProvider;
use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Model\ReservationCart;
use Brainsugar\Model\Sessions;
use Brainsugar\Model\Coupon;

class CartController extends Controller
{
        
        public function createOngoingReservation(){              
                $new_post = array(
                        'post_title'    => 'Ongoing Reservation',
                        'post_content'  => '',
                        'post_status'   => 'draft',          
                        'post_type'     => 'bshb_reservation' 
                );
                
                //insert the the post into database by passing $new_post to wp_insert_post
                //store our post ID in a variable $pid
                $response = wp_insert_post($new_post);
                return $response;
        }
        
        public function isCartSessionActive() {
                if(isset($_SESSION['bshb_session_cart'])){
                        return true;
                }
                else {
                        $this->setCartSession();
                        return true;
                }
        }
        public function setCartSession() {
                $_SESSION['bshb_session_cart'] = $this->createOngoingReservation();
        }
        public function unsetCartSession() {
                unset($_SESSION['bshb_session_cart']);
        }
        
        public function addItemToCart($itemId , $itemType , $itemQuantity) {
                // $this->unsetCartSession();
                if($this->isCartSessionActive() == true) {
                        $cart = new ReservationCart;
                        $reservationId = $_SESSION['bshb_session_cart'];
                        
                        
                        $insertItem = $cart->insertItem($reservationId , $itemId , $itemQuantity , $itemType);                       
                        
                        
                        if($insertItem == true && $itemType == "room_item") {
                                $response = $this->getCartTemplate($reservationId);
                        }
                        elseif($insertItem == true && $itemType == "service_item"){
                                 $response = $this->getCartSummary();
                        }
                        
                        
                }                
                return $response;
        }
        public function deleteRoomFromCart($itemId) {
                if($this->isCartSessionActive() == true) {
                        $cart = new ReservationCart;
                        $reservationId = $_SESSION['bshb_session_cart'];     
                        $deleteRoom = $cart->deleteRoomItem($reservationId , $itemId);
                        if($deleteRoom == true) {                              
                                $response = $this->getCartTemplate($reservationId);
                        }
                }
                return $response;
        }

        public function checkCouponCode($userCode) {
                 if($this->isCartSessionActive() == true) {

                         $coupon = new Coupon;
                         $couponValid = $coupon->isCouponValid($userCode);

                         if($couponValid == false) {
                              $response = [
                                        'coupon_status' => false,
                                        'coupon_message' => sprintf("Invalid Coupon")
                                ];
                         }
                         else {
                                $response =  [
                                        'coupon_status' => true,
                                        'coupon_message' => $coupon->getCouponMessage()
                                ];
                         }
                 }
                 return $response;
        }

        public function removeCouponCode() {
                if($this->isCartSessionActive() == true) {                        
                         $response = Coupon::unsetSessionCoupon();
                         return $response;
                }
        }
        
        public function getCartTemplate($reservationId) {
                $cart = new ReservationCart;
                $cartItems = $cart->getCartItems($reservationId);
                if($cartItems == null) {
                        ob_start();
                        echo  bshb_get_template_part('cart/cart', 'empty');
                        $response = ob_get_clean();
                }
                else {
                        // Call the searcj results template and fill the data       
                        ob_start();
                        echo  bshb_get_template_part('cart/cart', 'room');
                        echo  bshb_get_template_part('cart/cart', 'total' );
                        $response = ob_get_clean();
                }
                
                return $response;
        }

        public function getCartSummary(){
                ob_start();
                echo  bshb_get_template_part('cart/cart', 'summary');
                $response = ob_get_clean();
                return $response;
        }

        
        public function getSessionCart() {
                if(isset($_SESSION['bshb_session_cart'])) {
                        $cart = new ReservationCart;
                        $reservationId = $_SESSION['bshb_session_cart'];
                        $cartItems = $cart->getCartItems($reservationId); 
                        $response = $this->getCartTemplate($cartItems);
                        return $response;
                }
        }

        
        public function emptyCart() {
                if(isset($_SESSION['bshb_session_cart'])) {
                        $cart = new ReservationCart;
                        $reservationId = $_SESSION['bshb_session_cart'];
                        $response = $cart->deleteCartItems($reservationId);
                        return $response;
                }
        }
}