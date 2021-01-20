<?php
/**
* Landing page for search.
*
* This template can be overridden by copying it to {YOURTHEME}/bshb-template/search/
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

<!-- Search landing -->
<div class="landing-page">
        <div class="row">
                <div class="col-sm-12  text-center">
                        <div class="landing-content">
                                <img src="<?php echo esc_attr(esc_url(BSHB_ASSETS_PATH.'/img/download.png')); ?>" alt="<?php esc_attr_e('Start your search', 'bshb-td'); ?>">
                                <h1 class="text-center display-4"><?php esc_html_e('Lets start your search!', 'bshb-td'); ?></h1>
                                <p><?php esc_html_e('Enter dates to check for available rooms.', 'bshb-td'); ?></p>
                        </div>
                </div>
        </div>
</div>
<!-- end search landing -->


