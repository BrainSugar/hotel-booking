<?php

namespace Brainsugar\Admin\Fields;

use Brainsugar\Model\Room;

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
               $roomModel = new Room;
                // Get room units for the room type.
                        $roomsGenerated = $roomModel->getRoomIds($post_id);
                        $roomsPresent = count($roomsGenerated);

                        // yet more work : Settings
                        $maxRooms = Brainsugar()->options->get( 'General.max_rooms');
                        if($roomsGenerated){

                                // Get all the Rooms for the Room Type
                                 $roomUnits = $roomModel->getAllRoomUnits($post_id);
                                  require_once(dirname(__FILE__) . '/Views/Html-DisplayRoom.php');
                                
                        }

                        else {

                        $classes = "quantity-number";
                        $inputRoomNumber =  $field_type_object->input( array( 
                                'type' => 'number',
                                'id' => 'inputRoomNumber',
                                'max' => $maxRooms,
                                'min' => '0',
                                'value' => $roomsPresent,
                                'readonly' => 'readonly',
                                'class' => 'quantity-number',
                                ) );
                        
                        require_once(dirname(__FILE__) . '/Views/Html-GenerateRoom.php');
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
                        // Get number of rooms from User Input.
                        $numberOfRooms = $this->sanitizedValue;
                        
                        // The Default room name.
                        // $roomName = "Room unit ";
                        $title = get_the_title() . " ";
                        
                        // Room Details
                        $roomMeta  = [];
                        
                        // Loop to generate Rooms
                        for($i = 1; $i <= $numberOfRooms; $i++) {
                                
                                $roomMeta = [
                                        'name' => $title . $i,
                                        'room_type' =>$post_id,
                                        'order' => $i
                                ];                       
                                
                                $roomModel = new Room;
                                $response = $roomModel->createRoomUnit($roomMeta);                        
                                
                        }
                        return true;
                }
                
                
                
        }