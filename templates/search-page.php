<?php
/**
 * Search Page.
 *
 * This template can be overridden by copying it to {YOURTHEME}/bshb-template/
 *
 * @see http://docs.brainsugar.studio/hotel-booking/
 *
 * @author Brainsugar Studio
 *
 * @version 1.0
 */
 if (!defined('ABSPATH')) {
     exit;  //Exit if accessed directly.
 }

//  Get the header
get_header();
var_dump($_SESSION['bshb_session_id']);

// Get the html wrapper
bshb_get_template_part('global/wrapper-start');

// search form
bshb_get_template_part('search-form');

// search results
bshb_get_template_part('search/results');

// Get html wrapper end
bshb_get_template_part('global/wrapper-end');

// get footer
get_footer();
