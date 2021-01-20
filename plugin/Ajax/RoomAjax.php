<?php

namespace Brainsugar\Ajax;

use Brainsugar\WPBones\Foundation\WordPressAjaxServiceProvider as ServiceProvider;
use Brainsugar\Repositories\RoomRepository;

class RoomAjax extends ServiceProvider {
        
        /**
        * List of the ajax actions executed by both logged and not logged users.
        * Here you will used a methods list.
        *
        * @var array
        */        
        protected $trusted = [];
        
        /**
        * List of the ajax actions executed only by logged in users.
        * Here you will used a methods list.
        *
        * @var array
        */
        protected $logged = [   
                'addRoomUnit',
                'deleteRoomUnit',
                'updateRoomOrder',
                'updateRoomName',
        ];
        
        /**
        * List of the ajax actions executed only by not logged in user, usually from frontend.
        * Here you will used a methods list.
        *
        * @var array
        */
        protected $notLogged = [];

        /**
         * Room Respository Instance variable.
         *
         * @var RoomRepository
         */
        protected $room;


        public function __construct(){                
                $this->room = new RoomRepository;
        }
        
        /**
         * Add a room unit 
         *
         * @return bool
         */
        public function addRoomUnit() {
                $roomType = $_POST['postId'];
                $roomName = $_POST['roomName'];

                $response = $this->room->createRoomUnit($roomType , $roomName);

                wp_send_json( $response );
        }
        
        /**
         * Delete a room unit
         *
         * @return bool
         */
        public function deleteRoomUnit() {
                $roomId = $_POST['roomId'];

                $response = $this->room->deleteRoomUnit($roomId);

                wp_send_json( $response );
        }
        
        /**
         * Update room order
         *
         * @return bool
         */
        public function updateRoomOrder() {

                $roomSequence = $_POST['roomIds'];

                $response = $this->room->updateRoomOrder($roomSequence);

                wp_send_json($response);
        } 
        
        /**
         * Update the room name
         *
         * @return bool
         */
        public function updateRoomName() {

                $roomName = $_POST['roomName'];
                $roomId = $_POST['roomId'];

                $response = $this->room->updateRoomUnit($roomId , $roomName);

                wp_send_json($response);
        }

}