<?php
/**
 * Rooms in cart , displayed in search page.
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
<!-- Rooms in cart -->
<div class="row">
        <div class="col-sm-12">
                <?php foreach ($data as $item) { ?>
                <!-- Room item -->
                <div class="room-item">
                        <div class="room-header">
                                <!-- Room Image -->
                                <div class="room-image">
                                        <img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url($item['item_id'], 'full'))); ?>" />
                                </div>
                                <h4><?php esc_html_e(get_the_title($item['item_id']), 'bshb-td'); ?></h4>
                        </div>
                        <!-- Room Attributes and Details -->
                        <div class="room-details">
                                <div class="room-detail">
                                        <p><?php esc_html_e('Rooms', 'bshb-td'); ?></p>
                                        <p>x <?php echo esc_attr($item['item_quantity']); ?></p>
                                </div>
                                <div class="room-detail">
                                        <p><?php  esc_html_e('Nights', 'bshb-td'); ?></p>
                                        <p><?php echo  esc_html_e('x ', 'bshb-td').esc_html(bshb_get_stay_nights()); ?></p>
                                </div>
                        </div>
                        <!-- Room Total -->
                        <div class="room-total">
                                <p><?php esc_html_e('Sub total', 'bshb'); ?></p>
                                <h4><?php esc_html_e(bshb_format_currency($item['item_total'])); ?></h4>
                        </div>
                        <!-- Remove from cart button -->
                        <div class="remove-cart-item">
                                <button id="remove-room-item" title="<?php esc_html_e('Remove one room from cart', 'bshb-td'); ?>" class="btn" data-item-id="<?php echo esc_attr($item['item_id']); ?>"><?php esc_html_e('Remove Item', 'bshb-td'); ?></button>
                        </div>
                </div>
                <!-- End of room item -->
                <?php  } ?>
        </div>
</div>
<!-- end rooms in cart -->