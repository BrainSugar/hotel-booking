<?php
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

do_action('bshb_single_room_type_before_title');

 the_title( '<h1 class="room-title">', '</h1>' ); 

do_action('bshb_single_room_type_after_title');


