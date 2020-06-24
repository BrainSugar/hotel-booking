<?php
if ( !defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

do_action('bshb_room_type_container_start');

 if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
    bshb_get_template_part('single-room-type/title');
the_content();


    endwhile; 
endif;
 Brainsugar()->view('Admin.availability-calendar');
do_action('bshb_room_type_container_end');


get_footer();