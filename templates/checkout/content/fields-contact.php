   <?php
   /**
    * Guest form contact fields.
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
<!-- Contact fields heading -->
<h3 class="my-4 font-weight-light"><?php esc_html_e('Contact Information', 'bshb-td'); ?></h3>

        <div class="row my-5 mx-2">        
                <!-- Guest Email -->
                <div class="col-sm-5 my-2">
                        <label for="guest_email"><?php esc_html_e('Email address', 'bshb-td'); ?></label>
                        <div class="input-group">                        
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                                <i class="fad fa-at"></i>
                                        </span>
                                </div>
                                <input name="guest_email" id="guest_email" type="email" class="form-control" placeholder="<?php esc_attr_e('Email Address', 'bshb-td'); ?>">
                        </div>
                </div>
                <!-- End Guest Email -->

                <!-- Guest Phone number -->
                <div class="col-sm-5 my-2">  
                        <label for="guest_phone"><?php esc_html_e('Phone number', 'bshb-td'); ?></label>              
                        <div class="input-group">                        
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                                <i class="fad fa-phone"></i>
                                        </span>
                                </div>
                                <input name="guest_phone" id="guest_phone" type="number" class="form-control" placeholder="<?php esc_attr_e('Phone Number', 'bshb-td'); ?>">
                        </div>                        
                </div>
                <!-- End Guest Phone number -->
        </div>