<?php

namespace Brainsugar\Model;

use Illuminate\Database\Eloquent\Model;
use Brainsugar\Model\ReservationCart;
use Brainsugar\Model\Room;

class ReservationItems extends Model
{
        /**
        * The table associated with the model.
        *
        * @var string
        */
        protected $table = 'bshb_reservation_items';
        
        /**
        * Fillable attributes for the table,
        *
        * @var array
        */
        protected $fillable = ['reservation_id', 'item_id', 'item_type'];
        
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
        
        public function Reservations() {
                return $this->belongsTo(Reservations::class , 'reservation_id' , 'reservation_id')->toArray();
        }
        
        public function insertReservationItems($reservationId){
                
                $session = new Sessions;
                $sessionValue = $session->getSessionValue();
                
                $checkIn = $sessionValue['check_in'];
                $checkOut = $sessionValue['check_out'];
                $adults = $sessionValue['adults'];
                $children = $sessionValue['children'];
                
                $cartItems = ReservationCart::select('reservation_id','item_id' , 'item_type' , 'item_quantity')->where('reservation_id' , $reservationId)->get()->toArray();
                $room = new Room;
                $availableRooms = $room->getAvailableRooms($checkIn , $checkOut ,$adults , $children);
                $reservationItems = [];
                try{
                        foreach($cartItems as $item){
                                if($item['item_type'] == "room_item"){
                                        foreach($availableRooms as $roomType => $room)
                                        if($roomType == $item['item_id']){
                                                for($i = 0; $i < $item['item_quantity']; $i++){
                                                        array_push($reservationItems , ['reservation_id' => $item['reservation_id'],
                                                        'item_id' =>$room[$i],
                                                        'item_type' => $item['item_type'] ]);
                                                }
                                        }
                                        
                                }                
                        }
                }
                catch(Exception $e){
                        throw Exception($e);
                }
                
                $response = $this->insert($reservationItems);
                return $response;
        }
        
        public function getRoomItems($reservation) { 
                $roomItems = $this->select('item_id')
                ->where('item_type' , 'room_item')
                ->where('reservation_id' , $reservation)
                ->get();
                $response = $roomItems->pluck('item_id')->toArray();
                
                return $response;
        }
        public function getServiceItems($reservation) {
                $response = $this->select('item_id')
                ->where('item_type' , 'service_item')
                ->where('reservation_id' , $reservation)
                ->get();
                
                return $response;
                
        }
}