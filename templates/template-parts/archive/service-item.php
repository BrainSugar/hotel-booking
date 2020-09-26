<?php $maxSelectable = bshb_get_service_stock($post->ID); ?>
<div class="service-item">
        <div class="service-header">
                <div class="service-image">
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url( $post->ID , 'full')); ?>" />
                </div>
                <h3><?php the_title(); ?></h3>
        </div>
        <div class="service-description">
                <p><?php echo get_post_meta($post->ID , '_bshb_description', true ) ?></p>
        </div>

        <div class="service-content">
        <?php if (bshb_get_service_stock($post->ID)) {?>
                <div class="service-quantity">
                        <div class="input-wrapper d-flex m-auto">
                                <!-- Minus Button -->
                                <span class="minus cursor-pointer">
                                        <i class='fad fa-minus'></i>
                                </span>
                                <input type="number" class="quantity-number" name="input-stocks" id="input-stocks-<?php echo $post->ID; ?>" value="1" max="<?php echo esc_attr($maxSelectable); ?>" min="1" required readonly="readonly">
                                <!-- Plus button -->
                                <span class="plus  cursor-pointers">
                                        <i class='fad fa-plus'></i>
                                </span>
                        </div>
                </div>

        <?php } ?>

                <div class="service-price">
                        <h2><?php echo bshb_get_service_price($post->ID); ?></h2>
                </div>
        </div>
        <button class="btn btn-primary w-100">Add to Cart</button>
</div>

