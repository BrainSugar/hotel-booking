<?php var_dump($data); ?>
<div class="row">
        <div class="col-sm-12">
        <div class="cart-sub-total">
                        <h3><?php echo esc_html("Sub Total" , "bshb"); ?></h3>
                        <h1><?php echo bshb_format_currency($data['sub_total']);?></h1>
                </div>   
                
                       
                        <?php foreach($data['tax'] as $tax) { ?>
                                        <div class="cart-tax">
                                                <div class="tax-rate">
                                                        <h5><?php echo $tax['tax_name'] ?></h5>
                                                        <h6><?php echo '   ' . $tax['tax_rate'] ?></h6>
                                                </div>                                
                                                 <div class="tax-amount">
                                                        <h4><?php echo bshb_format_currency($tax['tax']); ?></h4>
                                                </div>
                                        </div>            
                        <?php } ?>
                
                <div class="cart-total">
                        <h3><?php echo esc_html("Total" , "bshb"); ?></h3>
                        <h1><?php echo bshb_format_currency($data['total']);?></h1>
                </div>        
        </div>
</div>
