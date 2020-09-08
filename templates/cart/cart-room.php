<div class="row">
        <div class="col-sm-12">
                <?php foreach($data as $item){ ?>
                <div class="room-item">
                        <div class="room-header">
                                <div class="room-image">
                                        <img src="<?php echo esc_url(get_the_post_thumbnail_url( $item['item_id'] , 'full')); ?>" />
                                </div>
                                <h4><?php echo get_the_title($item['item_id']); ?></h4>
                        </div>

                        <div class="room-details">
                                <div class="room-detail">
                                        <p><?php echo esc_html('Quantity' , 'bshb'); ?></p>
                                        <p>x <?php echo $item['item_quantity']; ?></p>
                                </div>
                                <div class="room-detail">
                                        <p>Nights</p>
                                        <p>x <?php echo esc_html(bshb_get_stay_nights()); ?></p>
                                </div>
                        </div>
                        <div class="room-total">
                                <p><?php echo esc_html("Sub total" , 'bshb');?></p>
                                <h4><?php echo bshb_format_currency($item['item_total']); ?></h4>
                        </div>
                        <div class="remove-cart-item">
                                <button id="remove-room-item" class="btn"  data-item-id = "<?php echo esc_attr($item['item_id']); ?>">Remove Item</button> 
                        </div>
                </div>
                <?php  } ?>
        </div>
</div>
