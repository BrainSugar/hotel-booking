<?php

namespace Brainsugar\Admin\Fields;

use Brainsugar\Admin\Fields\CustomFields;


class Title extends CustomFields { 
          
        
//         public function __construct() {
//                 add_action( 'cmb2_render_title', array($this ,'renderField' ) , 10, 5 );
//                 // add_action('admin_notices', 'email_custom_admin_notice');
//                 add_filter( 'cmb2_sanitize_generate_room', array( $this ,'sanitizeField'), 10, 2 );
                
//         }
//         function renderField( $field, $escaped_value, $object_id, $object_type, $field_type_object ) {                
//                 $this->getFieldView();
//         }
//         function sanitizeField( ) {
//         }
//         function getFieldView() {
//                 global $post_id;
//                 $roomUnits = $this->getGeneratedRooms();   
//                 $isRoomsGenerated = $roomUnits->contains('room_type',$post_id);                      
//                 require_once(dirname(__FILE__) . '/Views/Html-GenerateRoom.php');
//         }

//         function getGeneratedRooms() {   
//                 global $post_id;
//                 $roomUnits = Room::where('room_type', $post_id)->get();
//                 return $roomUnits;
//         }
        
// }
}