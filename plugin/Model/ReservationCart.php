<?php

namespace Brainsugar\Model;

use Illuminate\Database\Eloquent\Model;
use Brainsugar\Model\Pricing;
use Brainsugar\Model\Service;
use Brainsugar\Model\Sessions;
use Brainsugar\Model\Tax;
use Brainsugar\Model\Coupon;



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
        protected $fillable = [ 'reservation_id', 'item_id', 'item_type' , 'item_quantity' , 'item_total'];
        
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
        
        
        /**
        * Insert Item into the database
        * Checks whether the item is room or service and then gets price.
        *
        * @param [int] $reservationId
        * @param [int] $itemId
        * @param [int] $itemQuantity
        * @param [string] $itemType
        * @return void
        */
        public function insertItem($reservationId , $itemId , $itemQuantity , $itemType) {
                
                if($itemType == 'room_item') {
                        //  Get price of the room for the selected stay dates
                        $session = new Sessions;
                        $sessionValue = $session->getSessionValue();
                        $checkIn = $sessionValue['check_in'];
                        $checkOut = $sessionValue['check_out'];
                        $pricing = new Pricing;
                        $price = $pricing->get_room_rates_between_dates($itemId , $checkIn , $checkOut);
                        $itemTotal = $price['total'];            
                        
                        // Store the room item in the cart database
                        $response = $this->_storeItem($reservationId , $itemId , $itemType , $itemQuantity , $itemTotal);
                }
                
                else if($itemType == 'service_item') {
                        $service = new Service;
                        $price  =  $service->getServicePrice($itemId);
                        // if stock is single quantity = 1
                        $stockOperation = get_post_meta($itemId , 'bshb_stock_operation', true );
                        if ($stockOperation == "single") {
                                $itemQuantity = 1;
                        }
                        $itemTotal = $itemQuantity * $price;
                        
                        // Store the service item in the cart database
                        $response = $this->_storeItem($reservationId , $itemId , $itemType , $itemQuantity , $itemTotal);
                }
                return $response;
        }
        
        
        
        public function getCartItems($reservationId) {
                $response = $this->where('reservation_id' , $reservationId)->get()->toArray();
                return $response;
        }
        
        public function getRoomItems($reservationId){
                $response = $this->where('reservation_id' , $reservationId)->get()->toArray();
                return $response;
        }
        
        /**
        * Get cart total
        *
        * @param [type] $reservationId
        * @return array - cart total , cart tax , cart subtotal
        */
        public function getCartTotal($reservationId) {
                
                $cartItems = $this->where('reservation_id' , $reservationId)->get()->toArray();
                $itemPrices = [];
                foreach($cartItems as $item) {
                        array_push($itemPrices ,$item['item_total']);
                }
                $cartSubTotal = array_sum($itemPrices);                
                
                $coupon = new Coupon;                
                $tax = new Tax;
                
                $discountPrice = $coupon->applyDiscountToSubTotal($cartSubTotal);
                
                if($discountPrice != false){
                        $discount = $cartSubTotal - $discountPrice;
                        $calculateTaxes =$tax->calculateTaxRates($discountPrice);
                }
                else {
                        $discount = false;
                        $calculateTaxes =$tax->calculateTaxRates($cartSubTotal);
                }
                
                
                if($calculateTaxes == false) 
                {
                        $taxes = false;
                        
                        if($discountPrice != false){
                                $total = $discountPrice;
                        }
                        else {
                                $total = $cartSubTotal;
                        }
                        
                }
                else {
                        $taxes = $calculateTaxes['tax_data'];
                        $total = $calculateTaxes['total'];
                }
                
                $response = [
                        'sub_total' => $cartSubTotal,
                        'discount' => $discount,
                        'tax' => $taxes,
                        'total' => $total
                ];
                
                return $response;
        }
        
        private function _storeItem($reservationId , $itemId , $itemType, $itemQuantity , $itemTotal) {
                
                // Check if the item already exists
                $storedItem = $this->_checkItemExists($reservationId , $itemId);
                
                // If the item doesn't exist insert into the db
                if($storedItem == false){ 
                        $response = $this->fill(array(
                                'reservation_id' => $reservationId , 
                                'item_id' => $itemId,
                                'item_type' => $itemType,
                                'item_quantity' => absint($itemQuantity),
                                'item_total' => $itemTotal
                                ))->save(); 
                        }
                        // If the item exists then change the quantity and price of the item stored in the db.
                        else {
                                $storedQuantity = $storedItem['item_quantity'];
                                $storedPrice = $storedItem['item_total'];
                                
                                $newQuantity = $storedQuantity + $itemQuantity;
                                $newTotal = $storedPrice + $itemTotal;
                                
                                $response = $this->where('id' , $storedItem['id'])
                                ->update(array(
                                        'item_quantity' => $newQuantity , 
                                        'item_total' => $newTotal
                                ));
                        }
                        return $response;
                }
                
                private function _getRoomUnits($quantity){
                        
                }
                
                private function _applyDiscountCoupon($cartSubTotal) {
                        $coupon = new Coupon;
                        $response = $coupon->applyDiscountToSubTotal($cartSubTotal);
                        return $response;
                }
                
                private function _checkItemExists($reservationId , $itemId) {
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
                        
                        
                        $storedItem = $this->_checkItemExists($reservationId , $itemId);
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