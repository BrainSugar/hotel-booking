<?php
/**
 * Room Info.
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
?>

<!-- Container for info blocks -->
<div class="room-info">
        <!-- Room size -->
        <div class="room-size">
                <i class="fad fa-ruler-combined"></i>
                <p> 150 (ft²)</p>
        </div>
        <!-- Room Adults -->
        <div class="room-adults">
                <i class="fad fa-user"></i>
                <p><?php echo esc_html('x '.get_post_meta($post->ID, 'bshb_max_adults', true)); ?></p>
        </div>
        <!-- Room Children -->
        <div class="room-children">
                <i class="fad fa-child"></i>
                <p><?php echo esc_html('x '.get_post_meta($post->ID, 'bshb_max_children', true)); ?></p>
        </div>
</div>