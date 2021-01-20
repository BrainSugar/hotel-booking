<?php
/**
* Cart Total.
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

// Get current cart total
$cartTotal = bshb_get_cart_total();
?>
<?php if ($cartTotal) { ?>
<!-- Cart Total -->
<div class="row">
        <div class="col-sm-12">

                <!-- Cart sub total -->
                <div class="cart-sub-total">
                        <h2><?php esc_html_e('Sub Total', 'bshb-td'); ?></h2>
                        <h2><?php echo esc_html(bshb_format_currency($cartTotal['sub_total'])); ?></h2>
                </div>
                <!-- end of cart subtotal -->

                <?php if ($cartTotal['discount']) { ?>
                <!-- Cart discount -->
                <div class="cart-discount">
                        <span><?php esc_html_e('Discount', 'bshb-td'); ?></span>
                        <h2><?php echo esc_html(' - '.bshb_format_currency($cartTotal['discount'])); ?></h2>
                </div>
                <!-- end cart discount -->
                <?php } ?>

                <?php foreach ($cartTotal['tax'] as $taxes => $tax) { ?>
                <!-- Taxes on cart value -->
                <div class="cart-tax">
                        <div class="tax-rate ">
                                <span><?php echo esc_html($tax['tax_name']); ?></span>
                                <span><?php echo esc_html($tax['tax_rate']); ?></span>
                        </div>
                        <div class="tax-amount">
                                <h2><?php echo esc_html(bshb_format_currency($tax['tax'])); ?></h2>
                        </div>
                </div>
                <!-- end of cart taxes -->
                <?php } ?>

                <!-- Cart total value -->
                <div class="cart-total">
                        <h1 class="total "><?php esc_html_e('Total', 'bshb-td'); ?></h1>
                        <h1 class="total-amount"><?php echo esc_html(bshb_format_currency($cartTotal['total'])); ?></h1>
                </div>
                <!-- end cart total value -->
        </div>

        <?php if (!bshb_is_checkout_page()) { ?>
        <a href="<?php echo esc_attr(bshb_get_checkout_page()); ?>" class="btn btn-primary w-100 my-2 mx-3"><?php esc_html_e('Checkout', 'bshb-td'); ?></a>
        <?php } ?>

</div>
<!-- End of cart total  -->
<?php } else { ?>
<?php bshb_get_template_part('cart/empty'); ?>
<?php } ?>