<div class="payment-container">
        <h1 class="display-4 mb-5"><?php echo esc_html('Payment' , 'bshb'); ?></h1>
        <div class="row mx-5">      
                <div class="col-sm-12">
                <span class="payment-error"></span>
                <form id="payment_gateways">
                        <div class="radio">
                                <input type="radio" id="pay-desk" name="payment_option" value="pay_at_desk" >
                                <label for="pay-desk"><?php esc_html_e( 'Pay at desk', 'bshb' ) ?></label>
                        </div>
                </form>
                </div>
        </div>
        <hr>
        <div class="row">
                <div class="col-sm-12">
                        <div id = "bshb-payment-total" class="reserve-booking">
                                <?php $total = bshb_get_cart_total(); ?>
                                <h1 class="display-4"><?php echo bshb_format_currency($total['total']); ?></h1>
                                <button id = "bshb-reserve-booking" class="btn btn-primary">Reserve Booking</button>                        
                        </div>
                        
                </div>
        </div>
</div>