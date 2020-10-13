<?php 
$cartItems = bshb_get_order_summary();
$cartTotal = bshb_get_cart_total();
?>
<div class="row">
        <div class="col-sm-12">
        <!-- Cart Summary -->
                <div class="cart-summary">
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
                        <div class="promo-code">
                                <h6><?php echo esc_html('Promo Code' , 'bshb'); ?></h6>
                                <div class="row">
                                        <div class="col-sm-8">
                                                <div class="input-group">
                                                        <input type="text" id="input-coupon" class="form-control">                                                       
                                                </div>                                                 
                                        </div>
                                        <div class="col-sm-4">
                                                <button class="btn btn-primary w-100 " id="apply-coupon"><?php echo esc_html('Apply' , 'bshb'); ?></button>
                                        </div>
                                </div>
                                <p id="coupon-message" class = "mt-4 mb-0 d-none">Coupon Message</p>
                        </div>
                        <!-- End of Promo Code section -->
                                <div class="cart-sub-total">
                        <h2><?php echo esc_html("Sub Total" , "bshb"); ?></h2>
                        <h2><?php echo bshb_format_currency($cartTotal['sub_total']);?></h2>
                </div> 
                 <?php foreach($cartTotal['tax'] as $tax) { ?>
                                        <div class="cart-tax">
                                                <div class="tax-rate ">
                                                        <span><?php echo $tax['tax_name'] ?></span>
                                                        <span><?php echo $tax['tax_rate']; ?></span>
                                                </div>                                
                                                 <div class="tax-amount">
                                                        <h2><?php echo bshb_format_currency($tax['tax']); ?></h2>
                                                </div>
                                        </div>            
                        <?php } ?>

                <div class="cart-total">
                        <h1 class="total "><?php echo esc_html("Total" , "bshb"); ?></h1>
                        <h1 class="total-amount"><?php echo bshb_format_currency($cartTotal['total']);?></h1>                        
                </div>
                </div>
        </div>
</div>