<?php
/**
* Session Dates.
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
<!-- Session dates -->
<div class="row">
        <?php if (isset($data->check_in) && isset($data->check_out)) { ?>
        <div class="col-sm-6">
                <p class="date-heading"><?php esc_html_e('Check - in', 'bshb-td'); ?></p>
                <!-- Check in date -->
                <div class="stay-dates">
                        <div class="day">
                                <span class="display-4"><?php echo esc_html($data->check_in['day']); ?></span>
                        </div>
                        <div class="month-year">
                                <div class="month">
                                        <span><?php echo esc_html($data->check_in['month']); ?></span>
                                </div>
                                <div class="year">
                                        <span><?php echo esc_html($data->check_in['year']); ?></span>
                                </div>
                        </div>
                </div>
                <!-- end check in date -->
        </div>
        <div class="col-sm-6">
                <p class="date-heading"><?php esc_html_e('Check - Out', 'bshb-td'); ?></p>
                <!-- check out date -->
                <div class="stay-dates">
                        <div class="day">
                                <span class="display-4"><?php esc_attr_e($data->check_out['day']); ?></span>
                        </div>
                        <div class="month-year">
                                <div class="month">
                                        <span><?php esc_attr_e($data->check_out['month']); ?></span>
                                </div>
                                <div class="year">
                                        <span><?php esc_attr_e($data->check_out['year']); ?></span>
                                </div>
                        </div>
                </div>
                <!-- end check out date -->
        </div>
        <?php } else { ?>
        <div class="col-sm-12">
                <h1 class="font-weight-light empty-dates"><?php esc_html_e('Enter your stay dates.', 'bshb-td'); ?></h1>
        </div>
        <?php } ?>
</div>
<!-- end of session dates -->