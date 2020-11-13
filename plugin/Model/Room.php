<?php

namespace Brainsugar\Model;
use Illuminate\Database\Eloquent\Model;
use Brainsugar\Model\Reservations;

class Room extends Model
{
        /**
        * The table associated with the model.
        *
        * @var string
        */
        protected $table = 'bshb_rooms';

        /**
         * Primary Key
         *
         * @var string
         */       
        protected $primaryKey = "id";

        /**
         * Fillable attributes for the table,
         *
         * @var array
         */
        protected $fillable = ['name', 'room_type', 'order'];

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
         * Create a Room unit for a Room Type.
         *
         * @param [type] $roomMeta
         * @return void
         */
        public function createRoomUnit($roomMeta) {

                $this->fill($roomMeta);
                $response = $this->save();
                return $response;
        }
        
        /**
         * Get All Room Units for a given Room Type
         *
         * @param [type] $postId
         * @return void
         */
        public function getAllRoomUnits($postId) {
                
                $response = $this->where('room_type', $postId)->orderBy('order' , 'asc')->get();
                return $response;
        }

        /**
         * Delete a Room unit given its ID.
         *
         * @param [type] $roomUnitId
         * @return void
         */
        public function deleteRoomUnit($roomId){

                $response = $this->destroy($roomId) ;
                wp_send_json( $response );
        }

        public function getRoomIds($postId) {
                $response = $this->where('room_type', $postId)->orderBy('order')->pluck('id')->toArray();
                return $response;

        }
        public function updateRoomOrder($roomId , $order) {
                // Page::where('id', $id)->update(array('image' => 'asdasd'));             
                $response = $this->where('id' , $roomId)->update(['order' => $order]);
                return $response;

        }
        public function updateRoomName($roomName , $roomId) {
                
                $response = $this->where('id', $roomId)->update(['name'=> $roomName]);
                return $response;

        }
        /**
         * Get all the published room Types and get the room units for them.
         *
         * Used in Search Controller
         * 
         * @return void
         */
        public function getAllRoomTypeAndRoomUnits() {

                // Get all published room types
                $postIds = get_posts(array(
                        'post_type' => 'bshb_room',
                        'fields'          => 'ids',
                        'status' => 'published'
                ));              
                
                // loop through each room type and get all room ids for each room type.
                  foreach ($postIds as $postId){
                        $roomIds = $this->getRoomIds($postId);
                        $response[$postId] = $roomIds;
                }
                return $response;
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
                $allRoomTypesAndRoomUnits = $this->getAllRoomTypeAndRoomUnits();

                // The Remaining rooms after filtering occupancy
                $roomData =  $this->filterOccupancy($allRoomTypesAndRoomUnits , $adults , $children);
                
                // Get all reservations which are confirmed and inbetween the query dates.
                $reservationModel = new Reservations;
                $reservations = $reservationModel->getReservationBetweenQueryDates($checkIn , $checkOut , 'reserved');
                
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