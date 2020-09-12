<div class="row">
        <div class="col-sm-12">
        <div class="cart-sub-total">
                        <h2><?php echo esc_html("Sub Total" , "bshb"); ?></h2>
                        <h2><?php echo bshb_format_currency($data['sub_total']);?></h2>
                </div>                
                       
                        <?php foreach($data['tax'] as $tax) { ?>
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
                        <h1 class="total-amount"><?php echo bshb_format_currency($data['total']);?></h1>                        
                </div>
        </div>
        <a href="<?php echo bshb_get_checkout_page(); ?>" class="btn btn-primary w-100 my-2 mx-3">Checkout</a>
</div>
