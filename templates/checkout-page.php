<?php
/**
 * Check out page.
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

get_header();

// bshb wrapper for html
bshb_get_template_part('global/wrapper', 'start');

// Checkout page
bshb_get_template_part('checkout/checkout');

// bshb wrapper close
bshb_get_template_part('global/wrapper', 'end');

get_footer();
