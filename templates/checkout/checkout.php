<?php
/**
* Checkout Template.
*
* This template can be overridden by copying it to {YOURTHEME}/bshb-template/checkout/
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
<!-- Checkout -->
<div class="container-fluid">
        <div class="row">
                <div class="col-sm-8">
                        <div id="checkout-container" class="checkout-container">
                                <?php // bshb_get_template_part('checkout/checkout','services');?>
                                <?php bshb_get_template_part('checkout/guest', 'form'); ?>
                                <?php bshb_get_template_part('checkout/payment', 'form'); ?>
                        </div>
                </div>
                <div class="col-sm-4">
                        <div id="bshb-sidebar-cart" class="sidebar-cart">
                                <?php bshb_get_template_part('cart'); ?>
                        </div>
                </div>
        </div>
</div>
<!-- end of checkout -->
