<?php
/**
 * Room Price.
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

//  Get room Pricing
$roomPrice = bshb_get_room_price($post->ID, $data->check_in, $data->check_out, $data->price_filter);
?>

<!-- Room Princing -->
<div class="room-price">                                                
        <h1><?php echo esc_html($roomPrice['total']); ?></h1>
        <p class="font-italic"><?php echo esc_html($roomPrice['nights']); ?></p>
</div> 
<!-- end room pricing -->