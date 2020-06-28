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
 * 
 * @Hooked
 * bshb_container_start - 10 , 5
 * 
 */
do_action('bshb_container_start');


 if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 

        bshb_get_single_title();
        bshb_get_single_content();
        bshb_get_template_part('search/search-form');

    endwhile; 
endif;


 /**
* 
 * Room type container hook - after.
 * 
 * @Hooked
 * bshb_container_start - 10 , 5
 */
do_action('bshb_container_end');


get_footer();