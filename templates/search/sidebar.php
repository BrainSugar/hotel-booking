<?php
/**
 * Search sidebar.
 *
 * This template can be overridden by copying it to {YOURTHEME}/bshb-template/global/
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
<!-- Search sidebar -->
<div id = "bshb-sidebar-dates" class="session-dates">
        <?php bshb_get_template_part('search/session-dates'); ?>
</div>

<div id = "bshb-sidebar-cart" class="sidebar-cart">        
        <?php bshb_get_template_part('cart/empty'); ?>
</div>
<!-- end search sidebar -->