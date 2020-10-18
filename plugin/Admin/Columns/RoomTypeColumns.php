<?php
namespace Brainsugar\Admin\Columns;

if ( !class_exists( 'RoomTypeColumns' ) ) {
    class RoomTypeColumns extends ColumnManager implements RenderColumnsInterface {
        public function list_columns( $existing_columns ) {
            if ( empty( $existing_columns ) && ! is_array( $existing_columns ) ) {
                $existing_columns = array();
            }

            unset( $existing_columns['comments'], $existing_columns['date'] );

            $columns                    = array();
            $columns['max_guests']      = esc_html__( 'Max Guests', 'bshb-td' );
            $columns['rack_rate']       = esc_html__( 'Rack Rate', 'bshb-td' );
            $columns['rooms_available'] = esc_html__( 'Rooms Available', 'bshb-td' );
            $columns['image']           = esc_html__( 'Image', 'bshb-td' );

            return array_merge( $existing_columns, $columns );
        }

        public function render_columns( $column ) {
            global $post;

            switch( $column ){
                case 'max_guests':
                    $max_guests     = get_post_meta( $post->ID, "_{$this->prefix}_headcount", true );
                    $max_adults     = $max_guests['max_adults'] . 'A';
                    $max_children   = $max_guests['max_children'] . 'C';
                    $max_guests     = "$max_adults, $max_children";

                    echo $max_guests ;
                break;

                case 'rack_rate':
                    $rack_rate = get_post_meta( $post->ID, "_{$this->prefix}_rack_rate", true );
                    echo $rack_rate ;
                break;

                case 'rooms_available':
                    $stock_rooms = get_post_meta( $post->ID, "_{$this->prefix}_stock_rooms", true );
                    echo $stock_rooms ;
                break;

                case 'image':
                    if ( has_post_thumbnail() ) {
                        $featured_image = the_post_thumbnail( array(40, 40) );
                        echo $featured_image;
                    }
                break;
            }
        }
    }
}
