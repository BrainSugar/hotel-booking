<?php

namespace Brainsugar\Model;

use Illuminate\Database\Eloquent\Model;
use Brainsugar\Model\Pricing;
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

        public function createCart($reservationId , $itemId , $itemQuantity) {

        $checkIn = "2020-08-17";
        $checkOut = "2020-08-20";
        $itemQuantity = 1;
        $pricing = new Pricing;
        $price = $pricing->get_room_rates_between_dates($itemId , $checkIn , $checkOut);
        $total = $price['total'];

                $itemTotal = $itemQuantity * $total;                
                $this->fill(array(
                        'reservation_id' => $reservationId , 
                        'item_id' => $itemId,
                        'item_quantity' => $itemQuantity,
                        'item_total' => $itemTotal
                )); 
                $response = $this->save();
                return $response;
        }
        
}