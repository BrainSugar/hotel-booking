<?php

namespace Brainsugar\Ajax;

use Brainsugar\WPBones\Foundation\WordPressAjaxServiceProvider as ServiceProvider;
use Brainsugar\Http\Controllers\Frontend\CartController;
use Brainsugar\Providers\SessionServiceProvider;

class CartAjax extends ServiceProvider
{
        
        /**
        * List of the ajax actions executed by both logged and not logged users.
        * Here you will used a methods list.
        *
        * @var array
        */
        protected $trusted = [
                'cartSession',
                'addToCart',
                'removeFromCart',
                'applyCouponCode',
                'removeCouponCode'
        ];
        
        /**
        * List of the ajax actions executed only by logged in users.
        * Here you will used a methods list.
        *
        * @var array
        */
        protected $logged = [
                'logged'
        ];
        
        /**
        * List of the ajax actions executed only by not logged in user, usually from frontend.
        * Here you will used a methods list.
        *
        * @var array
        */
        protected $notLogged = [
                'notLogged'
        ];
        
        public function addToCart() {
                $itemQuantity = $_POST['itemQuantity'];
                $itemId = $_POST['itemId'];         
                $itemType =  $_POST['itemType'];         
                
                $cart = new CartController;                
     
                $response = $cart->addItemToCart($itemId , $itemType , $itemQuantity);                

                wp_send_json( $response );
        }

        public function removeFromCart() {
                $itemId = $_POST['itemId'];   
                $itemType =  $_POST['itemType'];
                $cart = new CartController;
                 if($itemType == "room_item")
                {
                       $response = $cart->deleteRoomFromCart($itemId);                        
                }
                
                if($itemType == "service")
                {
                        $response = $itemType;
                } 
                wp_send_json( $response);
        }

        public function applyCouponCode() {
                $userCode = $_POST['couponCode'];
                $cart = new CartController;
                $response = $cart->checkCouponCode($userCode);
               wp_send_json( $response);
        }

        public function removeCouponCode() {
                $cart = new CartController;
                $response = $cart->removeCouponCode();
                wp_send_json( $response );
        }
        
        public function cartSession() {
                $cart = new CartController;
                $sessionCart = $cart->getSessionCart();
                wp_send_json($sessionCart); 
        }
        
}