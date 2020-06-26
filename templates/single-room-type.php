<?php
/**
 *  Template to Display a Sinlge Room
 * 
 * Override this template by copying this file to {YourTheme}/bshb-templates/single-room-type.php
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

/**
 * Room type container hook - before
 *  
 */
do_action('bshb_room_type_before');

 if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 

    bshb_get_template_part('single-room-type/title');
    bshb_get_template_part('single-room-type/content');

    endwhile; 
endif;

 /**
 * Room type container hook - after.
 * 
 */
do_action('bshb_room_type_after');


get_footer();