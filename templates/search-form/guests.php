<?php
/**
* Search Form guests selection.
*
* This template can be overridden by copying it to {YOURTHEME}/bshb-template/search-form/
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

// $children_bookable = Brainsugar()->options->get('Reservation.children_bookable');
$children_bookable = 'true';
$maxRooms = 5;
$maxAdults = 8;
$maxChildren = 8;
?>
<!-- Guests selection -->
<div class="guests-wrapper">
        <p class="form-heading"><?php esc_html_e('Guests', 'bshb-td'); ?></p>
        <div class="row">
                <div class="col col-xs-12 guest-input">
                        <!-- wrapper for adults selection -->
                        <div class="input-wrapper d-flex m-auto">
                                <!-- Minus Button -->
                                <button class="minus">
                                        <i class='fad fa-minus'></i>
                                </button>
                                <input type="number" class="quantity-number" name="input-adults" id="input-adults" value="2" max="<?php esc_attr_e($maxAdults, 'bshb-td'); ?>" min="1" required readonly="readonly">
                                <!-- Plus button -->
                                <button class="plus">
                                        <i class='fad fa-plus'></i>
                                </button>
                        </div>
                        <!-- end wrapper for adults selection -->
                        <p class="guests-title"><?php esc_html_e('Adults', 'bshb-td'); ?></p>
                </div>

                <?php if ($children_bookable == 'true') { ?>
                <div class="col col-xs-12 guest-input">
                        <!-- Wrapper for children selection -->
                        <div class="input-wrapper d-flex m-auto">
                                <!-- Minus Button -->
                                <button class="minus">
                                        <i class='fad fa-minus'></i>
                                </button>
                                <input type="number" class="quantity-number" name="input-children" id="input-children" value="0" max="<?php esc_attr_e($maxChildren, 'bshb-td'); ?>" min="0" required readonly="readonly">
                                <!-- Plus button -->
                                <button class="plus">
                                        <i class='fad fa-plus'></i>
                                </button>
                        </div>
                        <!-- end wrapper for children selection -->
                        <p class="guests-title"><?php esc_html_e('Children', 'bshb-td'); ?></p>
                </div>
                <?php } ?>                
        </div>
</div>
<!-- end guests selection -->


<!-- Script to  incremend and decrement the plus and minus buttons -->
<script>
        (function ($) {
                'use strict';
                $('body').on('click', '.minus', function () {
                        var input = $(this).parent().find('input');
                        var count = parseInt(input.val()) - 1;
                        count = count < 1 ? 0 : count;
                        input.val(count);
                        input.change();
                        return false;
                });
                $('body').on('click', '.plus', function () {
                        var input = $(this).parent().find('input');
                        var count = parseInt(input.val()) + 1;
                        var max = input.attr('max');
                        count = count > max ? max : count;
                        input.val(count);
                        input.change();
                        return false;
                });
        })(jQuery)
</script>