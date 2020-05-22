<?php

namespace Brainsugar\Ajax;

use Brainsugar\WPBones\Foundation\WordPressAjaxServiceProvider as ServiceProvider;

use Brainsugar\Model\Room;

class RoomAjax extends ServiceProvider {
        
        /**
        * List of the ajax actions executed by both logged and not logged users.
        * Here you will used a methods list.
        *
        * @var array
        */
        
        protected $trusted = [
                'trusted'
        ];
        
        /**
        * List of the ajax actions executed only by logged in users.
        * Here you will used a methods list.
        *
        * @var array
        */
        protected $logged = [   
                'deleteRoomUnit',                
                'updateRoomOrder',
                'updateRoomName',
                'addRoom',
              
        ];
        
        /**
        * List of the ajax actions executed only by not logged in user, usually from frontend.
        * Here you will used a methods list.
        *
        * @var array
        */
        protected $notLogged = [
                'notLogged'
        ];
        
        
        /**
        * Generate room units specifed by the number of room units to be created.
        *
        * @return json
        */
        
     public function addRoom() {
           

                

                $roomName = $_POST['roomName'];

                $postId = $_POST['postId'];                

                
                $roomModel = new Room;

                // Get all the rooms already present.
                $rooms = $roomModel->getRoomIds($postId);

                // Checks already present rooms in the database.
                $numberOfRooms = count($rooms);               

                
                // Room Details
                $roomMeta  = [];

                        // increntement by 1 so the order of the newly created individual room unit doesnt conflict.
                        $roomMeta = [
                                'name' => $roomName,
                                'room_type' =>$postId,
                                'order' => $numberOfRooms + 1,
                        ];                       
                   
                        $response = $roomModel->createRoomUnit($roomMeta);
                        
                // }
                
                wp_send_json( $response );
        }
        
        
        
        /**
        * Delete a Room unit.
        *
        * @return json
        */

        public function deleteRoomUnit() {

                //Get the ID of the room unit to be deleted.
                $roomId = $_POST['roomId'];

                $roomModel = new Room;

                // Delete from DB
                $response = $roomModel->deleteRoomUnit($roomId) ;

                wp_send_json( $response );
        }


        /**
         * Update the Order of the Room Units.
         *
         * @return json 
         */

        public function updateRoomOrder() {

                // Reordered Array of RoomIDs
                $roomIds = $_POST['roomIds'];

                // Empty array to contain the order sequence.
                $order = [];

                // Create the room order array for the rooms.
                for($i=1; $i <= count($roomIds); $i++) {
                        array_push($order, $i);
                }
              
                // Merge the new order of rooms with an array of order.
               $newOrder = array_combine($roomIds , $order);

                //  New instance of Room Model.
                $roomModel = new Room;

                // Insert the new order into the DB 
                foreach($newOrder as $key => $value) {
                        $response = $roomModel->updateRoomOrder($key, $value);
                }
                wp_send_json($response);
        } 

        /**
         * Update Room Name
         *
         * @return void
         */
        public function updateRoomName() {
                
                // Room name by user input.
                $roomName = $_POST['roomName'];
                
                $roomId = $_POST['roomId'];

                $roomModel = new Room;

                $response = $roomModel->updateRoomName($roomName,$roomId);

                wp_send_json($response);

        }
             

}