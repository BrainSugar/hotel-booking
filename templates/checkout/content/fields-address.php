   <?php
   /**
    * Guest form address fields.
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
// get countries
$countries = bshb_get_countries();
?>
   <!-- Form fields heading -->
   <h3 class="my-4 font-weight-light"><?php esc_html_e('Billing Address', 'bshb-td'); ?></h3>

   <div class="row my-5 mx-2">
           <!-- Guest Address 1 -->
           <div class="col-sm-6 my-2">
                   <label for="guest_address_1"><?php esc_html_e('Address', 'bshb-td'); ?></label>
                   <div class="input-group">
                           <input name="guest_address_1" id="guest_address_1" type="text" class="form-control" placeholder="<?php esc_attr_e('Address Line 1', 'bshb-td'); ?>">
                   </div>
           </div>
           <!-- End Guest Address 1 -->

           <!-- Guest Address 2 -->
           <div class="col-sm-6 my-2">
                   <label for="guest_address_2"><?php esc_html_e('Address (optional)', 'bshb-td'); ?></label>
                   <div class="input-group">
                           <input name="guest_address_2" id="guest_address_2" type="text" class="form-control" placeholder="<?php esc_attr_e('Address Line 2', 'bshb-td'); ?>">
                   </div>
           </div>
           <!-- End Guest Address 2 -->
   </div>

   <div class="row mx-2">
           <!-- Guest City -->
           <div class="col-sm-4 my-2">
                   <label for="guest_city"><?php esc_html_e('City', 'bshb-td'); ?></label>
                   <div class="input-group">
                           <input name="guest_city" id="guest_city" type="text" class="form-control" placeholder="<?php esc_attr_e('City', 'bshb-td'); ?>">
                   </div>
           </div>
           <!-- End Guest City -->

           <!-- Guest Country -->
           <div class="col-sm-4 my-2">
                   <label for="guest_country"><?php esc_html_e('Country', 'bshb-td'); ?></label>
                   <div class="input-group">
                           <select name="guest_country" id="guest_country" class="form-control">
                                   <option value=""><?php esc_html_e('Select Country', 'bshb-td'); ?></option>
                                   <?php foreach ($countries as $country) { ?>
                                   <option value="<?php echo esc_attr($country); ?>"><?php echo esc_attr($country); ?></option>
                                   <?php } ?>
                           </select>
                   </div>
           </div>
           <!-- End Guest Country -->

           <!-- Guest Postcode -->
           <div class="col-sm-4 my-2">
                   <label for="guest_postcode"><?php esc_html_e('Postcode', 'bshb-td'); ?></label>
                   <div class="input-group">
                           <input name="guest_postcode" id="guest_postcode" type="number" class="form-control" placeholder="<?php esc_attr_e('Postcode / Zip', 'bshb-td'); ?>">
                   </div>
           </div>
           <!-- End Guest Postcode -->
   </div>