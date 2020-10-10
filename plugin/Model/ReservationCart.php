<?php

namespace Brainsugar\Model;

use Illuminate\Database\Eloquent\Model;
use Brainsugar\Model\Pricing;
use Brainsugar\Model\Service;
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
                        $response = $this->_storeItem($reservationId , $itemId , $itemQuantity , $itemTotal);
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
                        $response = $this->_storeItem($reservationId , $itemId , $itemQuantity , $itemTotal);
                }
                return $response;
        }
        
        
        
        public function getCartItems($reservationId) {
                // $cartItems = $this->
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
                $calclulateTaxes = $this->_calculateTaxRates($cartSubTotal);
                
                if($calclulateTaxes == false) 
                {
                        $response = $cartSubTotal;
                }
                else {
                        $response = [
                                'sub_total' => $cartSubTotal,
                                'tax' => $calclulateTaxes['tax_data'], 
                                'total' => $calclulateTaxes['total']
                        ];
                }
                
                return $response;
        }
        
        private function _storeItem($reservationId , $itemId , $itemQuantity , $itemTotal) {
                
                // Check if the item already exists
                $storedItem = $this->_checkItemExists($reservationId , $itemId);
                
                // If the item doesn't exist insert into the db
                if($storedItem == false){ 
                        $response = $this->fill(array(
                                'reservation_id' => $reservationId , 
                                'item_id' => $itemId,
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
                
                
                private function _calculateTaxRates($cartSubTotal) {
                        // TODO: create tax for separate rooms and services in the cart
                        // blanket tax rates
                        $posts = get_posts(
                                array(                                
                                        'post_type' => 'bshb_tax',                                
                                        )
                                );
                                
                                $taxData = [];
                                $taxes = [];
                                if(!empty($posts)) {
                                        foreach($posts as $post){
                                                $taxRate = get_post_meta( $post->ID , '_bshb_tax_percentage' , true);
                                                $tax = $cartSubTotal * $taxRate/100;
                                                array_push($taxes , $tax);
                                                array_push($taxData , [
                                                        'tax_name' => $post->post_title,
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