<?php
/**
* Cart Coupon.
*
* This template can be overridden by copying it to {YOURTHEME}/bshb-template/cart/
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

// Applied coupon code
$coupon = bshb_get_coupon_code();
// Class for coupon code
($coupon) ? ($coupon_class = '') : ($coupon_class = 'd-none');
?>
<?php if (bshb_is_checkout_page()) { ?>
<div class="row">
        <div class="col-sm-12">
                <!-- Coupon Code -->
                <div class="coupon-code">
                        <h6><?php esc_html_e('Coupon Code', 'bshb-td'); ?></h6>
                        <div class="row">
                                <div class="col-sm-8">
                                        <!-- Coupon input -->
                                        <div class="input-group">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                                <i class="fad fa-tags"></i>
                                                        </span>
                                                </div>
                                                <input type="text" id="input-coupon" value="<?php echo esc_attr($coupon['coupon_code']); ?>" class="form-control" placeholder="<?php echo esc_attr('Enter Coupon', 'bshb-td'); ?>">
                                        </div>
                                        <!-- end coupon input -->
                                </div>
                                <div class="col-sm-4">
                                        <button class="btn btn-primary w-100" id="apply-coupon"><?php esc_html_e('Apply', 'bshb-td'); ?></button>
                                </div>
                        </div>
                        <!-- coupon status -->
                        <div class="coupon-status <?php echo esc_attr($coupon_class); ?>">
                                <span id="coupon-message" class="text-success"><?php echo esc_html($coupon['coupon_message']); ?></span>
                                <button type="button" id="remove-coupon" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <!-- end of coupon status -->
                </div>
                <!-- end of Coupon code -->
        </div>
</div>
<?php } ?>