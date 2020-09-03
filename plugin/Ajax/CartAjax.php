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
                'addToCart'
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
                $itemQuantity = 1;
                $itemId = $_POST['itemId'];         
                $itemType =  $_POST['itemType'];         
                
                $cart = new CartController;
                
                if($itemType == "room_item")
                {
                        $response = $cart->addRoomToCart($itemId , $itemQuantity);                         
                }
                
                if($itemType == "service")
                {
                        $response = $itemType;
                }
                
                
                
                // $response = wp_get_current_user();
                wp_send_json( $response );
                
        }
        
        //   public function trusted()
        //   {
                //     $response = "You have clicked Ajax Trusted";
                
                //     wp_send_json( $response );
                //   }
                
                //   public function logged()
                //   {
                        //     $response = "You have clicked Ajax Logged";
                        
                        //     wp_send_json( $response );
                        //   }
                        
                        //   public function notLogged()
                        //   {
                                //     $response = "You have clicked Ajax notLogged";
                                
                                //     wp_send_json( $response );
                                //   }
                                
                        }