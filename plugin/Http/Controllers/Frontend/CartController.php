<?php

namespace Brainsugar\Http\Controllers\Frontend;

use Brainsugar\Providers\SessionServiceProvider;
use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Model\ReservationCart;
use Brainsugar\Model\Sessions;

class CartController extends Controller
{
        
        public function createOngoingReservation(){              
                $new_post = array(
                        'post_title'    => 'Ongoing Reservation',
                        'post_content'  => '',
                        'post_status'   => 'publish',          
                        'post_type'     => 'bshb_reservation' 
                );
                
                //insert the the post into database by passing $new_post to wp_insert_post
                //store our post ID in a variable $pid
                $response = wp_insert_post($new_post);
                return $response;
        }
        
        public function addRoomToCart($itemId , $itemQuantity) {
                // $cart = new ReservationCart;
                // $session = new SessionServiceProvider;
                // $sessionData = $this->startSession();
                // $reservationId = $this->createOngoingReservation();
                // $response = $cart->createCart($reservationId , $itemId , $itemQuantity);
                return "abc";
                
        }

        // public function startSession() {                
        //         $session = new SessionServiceProvider;
        //         $sessionData = $session->getSessionData();
        //         return $sessionData;

        // }
        
        //   public function index()
        //   {
                //     // GET
                //   }
                
                
                
                //   public function store()
                //   {
                        //     // POST
                        //   }
                        
                        //   public function update()
                        //   {
                                //     // PUT AND PATCH
                                //   }
                                
                                //   public function destroy()
                                //   {
                                        //     // DELETE
                                        //   }
                                        
                                }