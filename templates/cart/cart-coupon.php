<?php 
        $coupon = bshb_get_coupon_code(); 
        $couponMessage = bshb_get_coupon_message();
?>
<div class="coupon-code">
        <h6><?php echo esc_html('Coupon Code' , 'bshb'); ?></h6>
        <div class="row">
                <div class="col-sm-8">
                        <div class="input-group">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                                <i class="fad fa-tags"></i>
                                        </span>
                                </div>
                                <input type="text" id="input-coupon" value="<?php echo esc_html($coupon); ?>" class="form-control" placeholder="Enter Coupon">
                        </div>
                </div>
                <div class="col-sm-4">
                        <button class="btn btn-primary w-100" id="apply-coupon"><?php echo esc_html('Apply' , 'bshb'); ?></button>
                </div>
        </div>

        <div class="coupon-status d-none">
                <span id="coupon-message" class=""><?php echo bshb_get_coupon_message(); ?></span>
                <button type="button" id = "remove-coupon" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
        </div>
     
</div>