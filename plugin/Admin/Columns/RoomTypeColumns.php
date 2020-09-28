<?php
namespace Brainsugar\Admin\Columns;

use Brainsugar\CustomPostTypes\RoomTypeCustomPostType;
use Brainsugar\Model\Room;

class RoomTypeColumns extends ManageColumns {
    protected $postType;
    
    public function __construct() {
        $postType = RoomTypeCustomPostType::getPostType();

        $this->postType = $postType;
		$this->bshb_register_actions_and_filters();
    }

    public function bshb_register_actions_and_filters() {            
        add_filter( "manage_{$this->postType}_posts_columns", array( $this, "bshb_list_metabox_columns" ) );
		add_filter( "manage_{$this->postType}_posts_custom_column", array( $this, "bshb_render_metabox_columns" ) );
    }

    public function bshb_list_metabox_columns( $existing_columns ) {
		if ( empty( $existing_columns ) && ! is_array( $existing_columns ) ) {
			$existing_columns = array();
        }

        unset( $existing_columns['comments'], $existing_columns['date'] );

		$columns                      = array();
		$columns['max_guests']        = esc_html__( 'Max Guests', 'bshb-td' );
		$columns['rack_rate']         = esc_html__( 'Rack Rate', 'bshb-td' );
        $columns['rooms_available']   = esc_html__( 'Rooms Available', 'bshb-td' );
        
		return array_merge( $existing_columns, $columns );
	}

	public function bshb_render_metabox_columns( $column ) {
		global $post;

        switch( $column ){
            case 'max_guests':
                $max_guests     = get_post_meta( $post->ID, '_bshb_headcount', true );
                $max_adults     = $max_guests['max_adults'] . 'A';
                $max_children   = $max_guests['max_children'] . 'C';
                $max_guests     = "$max_adults, $max_children";

                echo $max_guests ;
            break;

            case 'rack_rate':
                $rack_rate = get_post_meta( $post->ID, '_bshb_rack_rate', true );
                echo $rack_rate ;
            break;

            case 'rooms_available':
                $stock_rooms = get_post_meta( $post->ID, '_bshb_stock_rooms', true );
                echo $stock_rooms ;
            break;
        }
	}
}