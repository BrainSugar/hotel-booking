<?php
/**
 * Rooms list layout.
 *
 * This template can be overridden by copying it to {YOURTHEME}/bshb-template/loop-room/
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
<div class="row">
        <?php foreach ($data->posts as $post) :  setup_postdata($post); ?>
        <?php if ($data->roomsLeft[$post->ID]) {?>
        <div class="col-sm-12">
                <!-- Room Container -->
                <article class="room-list-wrapper">
                        <div class="room-display">
                                <div class="room-image">
                                        <img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url($post->ID, 'full'))); ?>" />
                                </div>
                                <div class="room-amenities">
                                        <?php bshb_get_template_part('loop-room/content/amenities'); ?>
                                </div>
                        </div>
                        <div class="room-content">
                                <div class="row">
                                        <div class="col-sm-12 col-xs-12 col-md-6">
                                                <h1 class="room-title"><?php echo esc_html(the_title()); ?></h1>
                                        </div>
                                        <div class="col-sm-12 col-xs-12 col-md-6">
                                                <?php bshb_get_template_part('loop-room/content/info'); ?>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-12">
                                                <div class="room-desc">
                                                        <?php echo esc_html(the_excerpt()); ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-6">
                                                <?php bshb_get_template_part('loop-room/content/price'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                                <?php bshb_get_template_part('loop-room/content/add-to-cart'); ?>
                                        </div>
                                </div>
                        </div>
                </article>
                  <!-- end room container -->
        </div>
        <?php } ?>
        <?php endforeach; ?>
</div>
