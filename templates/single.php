<?php
if ( !defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

do_action('bshb_room_type_container_start');

 if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
get_template_part( 'bshb', 'title' );
    endwhile; 
endif;

do_action('bshb_room_type_container_end');

get_footer();