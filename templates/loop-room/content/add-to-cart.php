<?php
/**
 * Room Add to cart.
 *
 * This template can be overridden by copying it to {YOURTHEME}/bshb-template/loop-room/content/
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

//  Get the count of rooms
$room_count = $data->roomsLeft[$post->ID];
($room_count == 1) ? ($room_text = 'room') : ($room_text = 'rooms');
?>

<div class="room-add-cart d-flex align-items-center">
       <p class="room-count-text"><?php esc_html_e(sprintf('%d %s available', $room_count, $room_text)); ?></p>       
       <button class="btn btn-success room-add-btn" data-action = "<?php echo esc_attr('add'); ?>" data-item-id = "<?php echo esc_attr($post->ID); ?>" data-room-count="<?php echo esc_attr($room_count); ?>"><?php esc_html_e('Add to cart', 'bshb-td'); ?></button>                                        
</div>