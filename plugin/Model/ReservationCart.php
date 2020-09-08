<?php

namespace Brainsugar\Model;

use Illuminate\Database\Eloquent\Model;
use Brainsugar\Model\Pricing;
use Brainsugar\Model\Sessions;
class ReservationCart extends Model
{
        /**
        * The table associated with the model.
        *
        * @var string
        */
        protected $table = 'bshb_reservation_cart';
        
        
        /**
        * Fillable attributes for the table,
        *
        * @var array
        */
        protected $fillable = [ 'reservation_id', 'item_id', 'item_quantity' , 'item_total'];
        
        /**
        * Disable Timestamps
        *
        * @var boolean
        */
        public $timestamps = false;
        
        /**
        * Get the table associated with the model.
        *
        * @return string
        */
        public function getTable()
        {
                global $wpdb;
                
                return $wpdb->prefix . preg_replace('/[[:<:]]' . $wpdb->prefix . '/', '', parent::getTable(), 1);
        }
        
        
        
        public function insertRoomItem($reservationId , $itemId , $itemQuantity) {
                
                $session = new Sessions;
                $sessionValue = $session->getSessionValue();
                
                $checkIn = $sessionValue['check_in'];
                $checkOut = $sessionValue['check_out'];
                
                $storedItem = $this->checkItemExists($reservationId , $itemId);
                $pricing = new Pricing;
                $price = $pricing->get_room_rates_between_dates($itemId , $checkIn , $checkOut);
                $total = $price['total'];
                $itemQuantity = 1;     
                
                if($storedItem == false){ 
                        
                        $itemTotal = $itemQuantity * $total;                        
                        $this->fill(array(
                                'reservation_id' => $reservationId , 
                                'item_id' => $itemId,
                                'item_quantity' => absint($itemQuantity),
                                'item_total' => $itemTotal
                                ))->save(); 
                        }
                        else {
                                $storedQuantity = $storedItem['item_quantity'];
                                $storedPrice = $storedItem['item_total'];
                                
                                $newQuantity = $storedQuantity + $itemQuantity;
                                $newTotal = $storedPrice + $total;
                                
                                $this->where('id' , $storedItem['id'])
                                ->update(array(
                                        'item_quantity' => $newQuantity , 
                                        'item_total' => $newTotal
                                ));
                        }                 
                        
                        return true;
                }
                
                public function getCartItems($reservationId) {
                        // $cartItems = $this->
                        $response = $this->where('reservation_id' , $reservationId)->get()->toArray();
                        return $response;
                }
                
                public function checkItemExists($reservationId , $itemId) {
                        $storedItem = $this->where('reservation_id' , $reservationId)
                        ->where('item_id' , $itemId)
                        ->first();
                        
                        if($storedItem != null) {
                                $response = $storedItem->toArray();
                        }
                        else{
                                $response = false;
                        }
                        return $response;
                }
                
                public function deleteRoomItem($reservationId , $itemId ) {
                        
                        $session = new Sessions;
                        $sessionValue = $session->getSessionValue();
                        
                        $checkIn = $sessionValue['check_in'];
                        $checkOut = $sessionValue['check_out'];
                        
                        
                        $storedItem = $this->checkItemExists($reservationId , $itemId);
                        $pricing = new Pricing;
                        $price = $pricing->get_room_rates_between_dates($itemId , $checkIn , $checkOut);
                        $total = $price['total'];
                        $itemQuantity = 1; 
                        if($storedItem == false){ 
                                return false;
                        }
                        else {
                                $storedQuantity = $storedItem['item_quantity'];
                                
                                if($storedQuantity > 1)                        
                                {
                                        $storedPrice = $storedItem['item_total'];
                                        
                                        $newQuantity = $storedQuantity - $itemQuantity;
                                        $newTotal =  $storedPrice - $total;
                                        
                                        $this->where('id' , $storedItem['id'])
                                        ->update(array(
                                                'item_quantity' => $newQuantity , 
                                                'item_total' => $newTotal
                                        ));
                                        
                                }
                                else {
                                        $response = $this->where('reservation_id' , $reservationId)
                                        ->where('item_id' , $itemId)->delete();
                                }
                        }
                        return true;
                }
                
                
                
                public function deleteCartItems($reservationId) {
                        $response = $this->where('reservation_id' , $reservationId)->delete();
                        
                        return $response;
                }
                
                
        }