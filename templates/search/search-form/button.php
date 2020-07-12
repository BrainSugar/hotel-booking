<?php
/**
 * The template for displaying submit button in the search-form.php template
 *
 * This template can be overridden by copying it to {yourtheme}/awebooking/template-parts/search-form/button.php.
 *
 * @see      http://docs.awethemes.com/awebooking/developers/theme-developers/
 * @author   awethemes
 * @package  AweBooking
 * @version  3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>


<button id="search-submit" type="submit" class="btn btn-primary m-auto" style = "<?php echo esc_attr(bshb_get_style('search-button')); ?>"><?php esc_html_e( 'Check Availability', 'bshb' ); ?></button>

