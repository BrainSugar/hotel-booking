<?php

namespace Brainsugar\Admin\Columns;
use Brainsugar\CustomPostTypes\RoomCustomPostType;

class RoomColumns extends ManageColumns{
        
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
        }
        
        /**
        * Add filters of custom columns and set the data for them.
        *
        * @return void
        */
        public function addActionsAndFilters() {                
                add_filter( "manage_{$this->postType}_posts_columns", array($this,"customColumns"));
        }
        
        function customColumns() {
                $customColumns = array(
                        'room_image' => __('Room Image',''),
                        'title' => __('Title',''),
                        'room'	 => __( 'Room', 'your_text_domain' ),
                        'price'		 => __( 'Base Price', 'your_text_domain' ),
                        'occupancy'		 =>  __('Occupancy',''),
                        'date' => __('Date Published','')
                );                
                return $customColumns;
        }
        function columnContent() {
                
        }
}