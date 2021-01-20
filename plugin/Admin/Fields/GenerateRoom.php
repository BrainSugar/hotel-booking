<?php

namespace Brainsugar\Admin\Fields;

use Brainsugar\Model\Room;
use Brainsugar\Repositories\RoomRepository;

class GenerateRoom{ 


        /**
         * Number of Rooms.
         *
         * @var [int]
         */
        protected $sanitizedValue;
        
        
        public function __construct() {
                
                add_action( 'cmb2_render_generate_room', array($this ,'renderField' ) , 10, 5 );
                
                add_filter( 'cmb2_sanitize_generate_room', array( $this ,'sanitizeField'), 10, 2 ); 
                
                add_action( 'cmb2_save_field_bshb_generate_room',array( $this,'generateRooms'), 10, 3 );

        }
        
        
        
        
        function renderField( $field, $escaped_value, $object_id, $object_type, $field_type_object ) {
                
                global $post_id;
                $room = new RoomRepository;
                $roomUnits = $room->getRoomUnits()->where('room_type' , $post_id);
                $maxRooms = Brainsugar()->options->get( 'Room.max_rooms');                

                if($roomUnits->isEmpty()){
                        $classes = "quantity-number";
                        $inputRoomNumber =  $field_type_object->input( array( 
                                'type' => 'number',
                                'id' => 'inputRoomNumber',
                                'max' => $maxRooms,
                                'min' => '0',
                                'value' => count($roomUnits),
                                'readonly' => 'readonly',
                                'class' => 'quantity-number',
                                ) );
                        
                        require_once(dirname(__FILE__) . '/Views/Html-GenerateRoom.php');                        
                }
                else {
                        $classes = 'form-control';
                        $editRoomName = $field_type_object->input( array( 
                                'type' => 'text',
                                'id' => 'edit_room_name',
                                'value' => '',
                                'placeholder' => 'Enter room name',
                                'maxlength' => 25,                               
                                'class' => 'form-control',
                                ) );
                        require_once(dirname(__FILE__) . '/Views/Html-DisplayRoom.php');
                }
        }
        
        
        
        function sanitizeField($override_value, $value ) {
                // not an email? 
                if ( ! absint($value)) {
                        // Empty the value
                        $value = '';
                }
                $this->sanitizedValue = $value;
                return $value;
        }
        
        
        
        function generateRooms()
                {

                        global $post_id;                      
                        $title = get_the_title() . " ";

                        for($i = 1; $i <= $this->sanitizedValue; $i++){
                                $room = new RoomRepository;
                                $roomName = $title . $i;
                                $room->createRoomUnit($post_id , $roomName);
                        }
                        return true;
                }
        }