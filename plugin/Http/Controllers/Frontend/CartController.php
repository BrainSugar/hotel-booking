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
                          $_SESSION['bshb_session_cart'] = $this->createOngoingReservation();
                          return true;
                }
        }
        public function unsetCartSession() {
                unset($_SESSION['bshb_session_cart']);
        }
 
        public function addRoomToCart($itemId , $itemQuantity) {
                // $this->unsetCartSession();
                if($this->isCartSessionActive() == true) {
                        $cart = new ReservationCart;
                        $reservationId = $_SESSION['bshb_session_cart'];

                        $insertRoom = $cart->insertRoomToCart($reservationId , $itemId , $itemQuantity);
                        if($insertRoom == true) {
                                $cartContents = $cart->getCartContents($reservationId);

                                $response = $this->getCartTemplate($cartContents);
                        }
                }                
                return $response;
                
        }

        public function getCartTemplate($cartContents) {          
                  // Call the searcj results template and fill the data       
                ob_start();
                        echo  bshb_get_template_part('cart/item', 'room' , $cartContents);
               $response = ob_get_clean();

                return $response;
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