<?php
/**
 * Search dates
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
<!-- Search form Dates -->
 <div class="row">
         <div class="col-sm-6">
                 <div class="check-in-wrapper">
                         <p class="form-heading"><?php esc_html_e('Check In', 'bshb-td'); ?></p>
                         <div class="input-group">
                                 <input type="text" name="check-in" id="input-check-in" class="input-check-in form-control" placeholder="<?php echo esc_attr('Check-in'); ?>" required/>                               
                         </div>                         
                 </div>
                 <!-- Validation message -->
                 <p class="text-danger d-none validate-msg"><?php esc_html_e('Please enter your stay dates.', 'bshb-td'); ?></p>
         </div>
         <div class="col-sm-6">
                 <div class="check-out-wrapper">
                         <p class="form-heading"><?php esc_html_e('Check Out', 'bshb-td'); ?></p>
                         <div class="input-group">
                                 <input type="text" name="check-out" id="input-check-out" class="input-check-out form-control" placeholder="<?php echo esc_attr('Check-out'); ?>" required/>
                         </div>
                 </div>
         </div>
 </div>
 <!-- end search form dates -->