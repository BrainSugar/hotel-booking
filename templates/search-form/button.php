<?php
/**
 * Search Buttons.
 *
 * This template can be overridden by copying it to {YOURTHEME}/bshb-template/search-form/
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
?>
<!-- Search rooms button -->
<button id="search-submit" type="submit" class="btn btn-primary m-auto" title="<?php esc_attr_e('Search Rooms', 'bshb-td'); ?>">
        <?php esc_html_e('Check Availability', 'bshb-td'); ?>
</button>

