<?php

namespace Brainsugar\Model;
use Illuminate\Database\Eloquent\Model;

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
        
}