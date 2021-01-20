<?php
/**
* Rooms in cart as summary , displayed in checkout page.
*
* This template can be overridden by copying it to {YOURTHEME}/bshb-template/cart/content
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
<!-- Cart Items  as summary -->
<div class="cart-summary">
        <h1 class="p-3 display-4"><?php esc_html_e('Order Summary', 'bshb-td'); ?></h1>
        <?php foreach ($data as $item) { ?>
        <!-- Room Item summary -->
        <div class="summary-item">
                <div class="summary-header">
                        <!-- room image -->
                        <div class="summary-image">
                                <img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url($item['item_id'], 'full'))); ?>" />
                        </div>
                        <h3><?php esc_html_e(get_the_title($item['item_id'])); ?></h3>
                </div>
                <!-- room content -->
                <div class="summary-content">
                        <p><?php echo esc_html('Rooms x ', 'bshb-td').esc_attr($item['item_quantity']); ?></p>
                        <h3><?php echo esc_html(bshb_format_currency($item['item_total'])); ?></h3>
                </div>
        </div>
        <!-- end of room item summary -->
        <?php } ?>
</div>
<!-- End of cart items as summary -->