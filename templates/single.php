<?php
/*
Plugin Name: Brainsugar Hotel Booking
Plugin URL: http://wp.tutsplus.com/
Description: Loads a custom template file instead of the default single.php
Version: 0.1
Author: Remi Corson
Author URI: http://wp.tutsplus.com/
*/


get_header();

 if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 

the_content();  

    endwhile; 
endif;
get_footer();