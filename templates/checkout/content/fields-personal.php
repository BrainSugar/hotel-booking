<?php
/**
* Guest form personal fields.
*
* This template can be overridden by copying it to {YOURTHEME}/bshb-template/checkout/content
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
<!-- Personal fields heading -->
<h3 class="mb-4 font-weight-light"><?php esc_html_e('Personal Information', 'bshb-td'); ?></h3>

<div class="row p-2 my-5 mx-2">

        <!-- Guest First Name -->
        <div class="col-sm-5 my-2">
                <label for="guest_first_name"><?php esc_html_e('First Name', 'bshb-td'); ?></label>
                <div class="input-group">
                        <input name="guest_first_name" id="guest_first_name" type="text" class="form-control" placeholder="<?php esc_attr_e('First Name', 'bshb-td'); ?>">
                </div>
        </div>
        <!-- End Guest First Name -->

        <!-- Guest Last Name -->
        <div class="col-sm-5 my-2">
                <label for="guest_last_name"><?php esc_html_e('Last Name', 'bshb-td'); ?></label>
                <div class="input-group">
                        <input name="guest_last_name" id="guest_last_name" type="text" class="form-control" placeholder="<?php esc_attr_e('Last Name', 'bshb-td'); ?>">
                </div>
        </div>
        <!-- End Guest Last Name -->
</div>
