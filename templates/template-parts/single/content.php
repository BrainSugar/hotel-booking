<?php
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

do_action('bshb_single_room_type_before_content');

 the_content( '<p class="room-content">', '</p>' ); 


do_action('bshb_single_room_type_after_content');

