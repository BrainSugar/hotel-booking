<?php

namespace Brainsugar\Model;
use Illuminate\Database\Eloquent\Model;
use Brainsugar\Model\ReservationItems;
use Brainsugar\Model\Pricing;
use Brainsugar\Model\Room;
use Carbon\Carbon;

class Reservations extends Model
{
        /**
        * The table associated with the model.
        *
        * @var string
        */
        protected $table = 'bshb_reservations';
        
        
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
        * Get all available rooms for a given search Query.
        *
        * @param [date] $checkIn
        * @param [date] $checkOut
        * @param [int] $adults
        * @param [int] $children
        * @return object
        */
        public function getAvailableRooms($checkIn , $checkOut , $adults , $children = null) {
                
                                
                // Get All Room Types and their rooms that are published
                $roomModel = new Room;                
                $allRoomTypesAndRoomUnits = $roomModel->getAllRoomTypeAndRoomUnits();

                // The Remaining rooms after filtering occupancy
                $roomData =  $this->filterOccupancy($allRoomTypesAndRoomUnits , $adults , $children);
                
                // Get all reservations which are confirmed and inbetween the query dates.
                $reservations = $this->getReservationBetweenQueryDates($checkIn , $checkOut , 'reserved');
                
                // Get all the rooms which are reserved between the query dates.
                $reservationItems = new ReservationItems;
                $reservedRooms = [];
                
                foreach($reservations as $reservation) {
                        // Get reserved rooms for each reservation.
                        $rooms = $reservationItems->getRoomItems($reservation->reservation_id);
                        foreach($rooms as $room) {
                                array_push($reservedRooms , $room);
                        }
                }
                
                // Check reserved rooms with  all the rooms and get rooms which are available.
                $availableRooms = [];
                foreach($roomData as $key=>$value) {                                                       
                        $availableRooms[$key] = array_values(array_diff($value , $reservedRooms));
                }                
                return $availableRooms;
        }
        
        
        
        /**
        * Get the reservation ID and dates of their reservation.
        *
        * @param [date] $checkIn
        * @param [date] $checkOut
        * @param [string] $status
        * @return object
        */
        public function getReservationBetweenQueryDates($checkIn , $checkOut , $status) {
                // get all reservations where checkin and checkout lies between reservations.
                $response = $this->select('reservation_id' , 'check_in' , 'check_out')
                ->where('reservation_status' , $status) 
                ->whereRaw('? between check_in and check_out' , $checkIn)
                ->orwhereRaw('? between check_in and check_out' , $checkOut)
                ->get();
                
                return $response;
        }
        
        public function filterOccupancy($roomData , $adults , $children = null) {

                 foreach($roomData as $key => $value) {
                         $maximumOccupancy = get_post_meta( $key, 'bshb_max_occupancy', true );
                         $maxAdults = get_post_meta( $key, 'bshb_max_adults', true );
                         $maxChildren = get_post_meta( $key, 'bshb_max_children', true );

                         if($adults + $children > $maximumOccupancy) {
                                 unset($roomData[$key]);
                         }
                         else if($adults > $maxAdults) {
                                 unset($roomData[$key]);
                         }
                         else if($children > $maxChildren){
                                  unset($roomData[$key]);
                         }
                }
                return $roomData;                
        }
}