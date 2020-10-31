        <!-- Cart Summary -->
                <div class="cart-summary">
                <?php 
                        $cartItems = bshb_get_cart_items();
                        $cartTotal = bshb_get_cart_total();
                ?>
                        <h1 class="p-3 display-4"><?php echo esc_html('Order Summary'); ?></h1>

                        <!-- Cart Items  -->
                        <?php foreach($cartItems as $item) { ?>
                                <div class="summary-item">
                                        <div class="summary-header">
                                                <div class="summary-image">
                                                        <img src="<?php echo esc_url(get_the_post_thumbnail_url( $item['item_id'] , 'full')); ?>" />
                                                </div>
                                                <h3><?php echo get_the_title($item['item_id']); ?></h3>
                                        </div>
                                        <div class="summary-content">
                                                <p><?php echo esc_html('Quantity') . ' x ' . $item['item_quantity']; ?></p>
                                                <h3><?php echo esc_html(bshb_format_currency($item['item_total'])); ?></h3>
                                        </div>
                                </div>
                        <?php } ?>
                        <!-- End of cart items -->

                        <!-- Promo Code section -->
                        <?php bshb_get_template_part('cart/cart' , 'coupon'); ?>
                        <!-- End of Promo Code section -->

                        <!-- Promo Code section -->
                        <div id="bshb-cart-final-total">
                                <?php bshb_get_template_part('cart/cart' , 'total'); ?>
                        </div>
                        
                        <!-- End of Promo Code section -->
                </div>