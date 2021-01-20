<?php
/**
 * Cart.
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

?>
<!-- Cart -->
<div id="cart-rooms">
        <?php bshb_get_template_part('cart/rooms'); ?>
</div>

<div id="cart-coupon">
        <?php bshb_get_template_part('cart/coupon'); ?>
</div>

<div id="cart-total">
        <?php bshb_get_template_part('cart/total'); ?>
</div>
<!-- end cart -->