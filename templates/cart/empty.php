<?php
/**
 * Cart Empty.
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
?>
<!-- Cart Empty -->
<div class="cart-empty">
        <img src="<?php echo esc_attr(esc_url(BSHB_ASSETS_PATH.'/img/empty-cart.png')); ?>" alt="<?php esc_attr_e('Empty cart', 'bshb-td'); ?>">
</div>
<!-- end cart empty -->