<?php 
$cartTotal = bshb_get_cart_total();
?>
<div class="row">
        <div class="col-sm-12">
                <div class="cart-sub-total">
                        <h2><?php echo esc_html("Sub Total" , "bshb"); ?></h2>
                        <h2><?php echo bshb_format_currency($cartTotal['sub_total']);?></h2>
                </div>
                        
                        <?php if($cartTotal['discount']) { ?>
                                <div class="cart-discount">
                                                <span><?php echo esc_html('Discount'); ?></span>
                                                <h2><?php echo ' - ' . bshb_format_currency($cartTotal['discount']); ?></h2>                
                                </div>
                        <?php } ?>
                       
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
        
        <?php if(!bshb_is_checkout_page()) { ?>
                <a href="<?php echo bshb_get_checkout_page(); ?>" class="btn btn-primary w-100 my-2 mx-3"><?php echo esc_html( "Checkout" );?></a>
        <?php } ?>
</div>
