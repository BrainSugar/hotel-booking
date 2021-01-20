<?php
/**
* Checkout Guest form.
*
* This template can be overridden by copying it to {YOURTHEME}/bshb-template/checkout/
*
* @see http://docs.brainsugar.studio/hotel-booking/
*
* @author Brainsugar Studio
*
* @version 1.0
*/
if (!defined('ABSPATH')) {
    exit;  //Exit if accessed directly.
}
?>
<!-- Guest info section -->
<div class="guest-container">
        <!-- Form title -->
        <h1 class="display-4 mb-5"><?php echo esc_html('Guest Details', 'bshb'); ?></h1>
        <form class="p-4" id="bshb-guest-form" method="post">                
                <?php bshb_get_template_part('checkout/content/fields', 'personal'); ?>
                <hr>
                <?php bshb_get_template_part('checkout/content/fields', 'contact'); ?>
                <hr>
                <?php bshb_get_template_part('checkout/content/fields', 'address'); ?>     
        </form>

</div>
<!-- end guest info secction -->