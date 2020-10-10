
<div class="container-fluid">
        <div class="row">
                <div class="col-sm-8">
                        <div id="checkout-container" class="checkout-container">
                                <?php bshb_get_template_part('checkout/checkout','services'); ?> 
                        </div>                     
                </div>
                <div class="col-sm-4">
                      <?php bshb_get_template_part('cart/cart' , 'summary' ); ?>
                </div>        
        </div>
        </div>
