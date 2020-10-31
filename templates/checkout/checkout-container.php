
<div class="container-fluid">
        <div class="row">
                <div class="col-sm-8">
                        <div id="checkout-container" class="checkout-container">
                                <?php // bshb_get_template_part('checkout/checkout','services'); ?> 
                                <?php bshb_get_template_part('checkout/checkout','guest'); ?> 
                                <?php bshb_get_template_part('checkout/checkout','payment'); ?> 
                        </div>                     
                </div>
                <div class="col-sm-4">
                        <div id = "bshb-cart-summary">
                                <?php bshb_get_template_part('cart/cart' , 'summary' ); ?>
                      </div>
                </div>        
        </div>
        </div>
