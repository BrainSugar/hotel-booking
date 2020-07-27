<?php

namespace Brainsugar\Admin\Metaboxes;
use Brainsugar\CustomPostTypes\RoomCustomPostType;
use Brainsugar\Admin\Fields\Tabs;
use Brainsugar\Admin\Fields\GenerateRoom;
use Brainsugar\Model\Room;



class RoomMetabox extends ManageMetaboxes {        

       /**
         * The post type id.
         *
         * @var [string]
         */
        protected $postType;
        
        
        public function __construct()
        {         
                
                $postType = RoomCustomPostType::getPostType();
                $this->postType = $postType; 
                $cmbtabs = new Tabs;
                $generateRoom = new GenerateRoom;                
                
        }

        function addActionsAndFilters() {
                add_action( "cmb2_init", array($this,"roomFields"));
        }
        
        function roomFields(){ 

       $prefix = 'bshb_';

	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'room',
                'title'         => __( 'Room Settings', 'cmb2' ),
               
		'object_types'  => $this->postType, // Post type
                'vertical_tabs' => true, // Set vertical tabs, default false    
                'closed' => false, 
                'show_in_rest' => true,
        'tabs' => array(
            array(
                'id'    => 'generate-room',
                'icon' => 'dashicons-admin-multisite',
                'title' => 'Rooms',                
                'fields' => array(                    
                    $prefix . 'generate_room',
                    $prefix . 'generate_room_title'
                //     $prefix. '_field_3',
                ),
            ),
            array(
                'id'    => 'pricing',
                'icon' => 'fad fa-time',
                'title' => 'Pricing',                
                'fields' => array(
                        $prefix . 'pricing_title',
                    $prefix . 'room_price'                    
                ),
            ),
            array(
                    'id' => 'occupancy',
                    'icon' => 'fad fa-time',
                    'title' => 'Occupancy',
                    'fields' => array(
                            $prefix.'occupancy_title',
                            $prefix.'max_occupancy',
                            $prefix.'max_adults',
                            $prefix.'max_children',
                    ),
            ),
        //                 array(
        //         'id'    => 'occupancy',
        //         'icon' => 'fad fa-times',
        //         'title' => 'Occupancy',
        //         'fields' => array(
        //             $prefix . '_field_3',
        //             $prefix . '_field_4',
        //         ),
        //     ),
        //                 array(
        //         'id'    => 'amenities',
        //         'icon' => 'dashicons-align-left',
        //         'title' => 'Amenities',
        //         'fields' => array(
        //             $prefix . '_field_3',
        //             $prefix . '_field_4',
        //         ),
        //     ),
        )
        ) );

        
        $cmb_demo->add_field( array(
	'name' => __('Rooms'),
	'desc' => 'Create and view all the rooms for this room type.',
        'type' => 'title',        
        'id'   => $prefix . 'generate_room_title',
        'classes' => 'bshb-title',
) );

	$cmb_demo->add_field( array(		
                'id'            => $prefix . 'generate_room',                
                'type'          => 'generate_room',
                'column' => array(
                        'name' => 'Number of Rooms'
                ),
                // 'desc'          =>'Choose the number of rooms you want for this room type. '
             
                // 'default_cb' => $this->saveData()
	) );

// 	$cmb_demo->add_field( array(
//         'name'          => __( 'Email', 'cmb2' ),
//         'id'            => $prefix . '_field_2',
//         'type'          => 'text',
//     ) );

        $cmb_demo->add_field( array(
	'name' => __('Pricing'),
	'desc' => 'Manage pricing for this room type.',
        'type' => 'title',        
        'id'   => $prefix . 'pricing_title',
        'classes' => 'bshb-title',
) );

    $cmb_demo->add_field( array(
        'name'          => __( 'Room Price', 'cmb2' ),
        'id'            => $prefix . 'room_price',
        'type'          => 'text',
        'attributes' => array(
                'type' => 'number',
        ),
        'class' => 'form-control',
                'repeatable' => false,

    ) );
    
//     Ocuupancy fields
            $cmb_demo->add_field( array(
	'name' => __('Occupancy'),
	'desc' => 'Set limits on number of people this room type can handle.',
        'type' => 'title',        
        'id'   => $prefix . 'occupancy_title',
        'classes' => 'bshb-title',
) );

    $cmb_demo->add_field( array(
        'name'          => __( 'Maximum Occupancy', 'cmb2' ),
        'id'            => $prefix . 'max_occupancy',
        'type'          => 'text',      
         'attributes' => array(
        'type' => 'number',
    ),
                'repeatable' => false,

    ) );

        $cmb_demo->add_field( array(
        'name'          => __( 'Adults', 'cmb2' ),
        'id'            => $prefix . 'max_adults',
        'type'          => 'text',      
         'attributes' => array(
        'type' => 'number',
    ),
                'repeatable' => false,

    ) );

        $cmb_demo->add_field( array(
        'name'          => __( ' Children', 'cmb2' ),
        'id'            => $prefix . 'max_children',
        'type'          => 'text',      
         'attributes' => array(
        'type' => 'number',
    ),
                'repeatable' => false,

    ) );
//     $cmb_demo->add_field( array(
//         'name'          => __( 'Test field 4', 'cmb2' ),
//         'id'            => $prefix . '_field_4',
//         'type'          => 'text',
//     ) );
}




}