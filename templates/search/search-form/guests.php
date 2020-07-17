<?php

        // $children_bookable = Brainsugar()->options->get('Reservation.children_bookable');
        $children_bookable = "true";
        $maxRooms = 5;
?>
<div class="guests-wrapper">
        <p class="form-heading"><?php echo esc_html('Guests'); ?></p>
        <div class="row">
                <div class="col-sm-6 col-xs-12 guest-input">
                        <div class="input-wrapper d-flex m-auto">
                                <!-- Minus Button -->
                                <span class="minus cursor-pointer">
                                        <i class='fad fa-minus'></i>
                                </span>
                                <input type="number" class="quantity-number" name="input-adults" id="input-adults" value="2" max="8" min="1" required  readonly="readonly">
                                <!-- Plus button -->
                                <span class="plus  cursor-pointers">
                                        <i class='fad fa-plus'></i>
                                </span>                                
                        </div>    
                        <p class="guests-title"><?php echo esc_html('Adults' , 'bshb') ?></p>                  
                </div>

                 <?php if($children_bookable == "true") { ?>
                <div class="col-sm-6 col-xs-12 guest-input">
                        <div class="input-wrapper d-flex m-auto">
                                <!-- Minus Button -->
                                <span class="minus cursor-pointer">
                                        <i class='fad fa-minus'></i>
                                </span>
                                <input type="number" class="quantity-number" name="input-children" id="input-children" value="0" max="8" min="0" required readonly="readonly">
                                <!-- Plus button -->
                                <span class="plus  cursor-pointers">
                                        <i class='fad fa-plus'></i>
                                </span>
                        </div>
                        <p class="guests-title"><?php echo esc_html('Children' , 'bshb') ?></p>
                </div>
                <?php } ?>
        </div>
</div>


<!-- Script to  incremend and decrement the plus and minus buttons -->
<script>
        (function ($) {
                'use strict';
                $('body').on('click', '.minus', function () {
                        var $input = $(this).parent().find('input');
                        var count = parseInt($input.val()) - 1;
                        count = count < 1 ? 0 : count;
                        $input.val(count);
                        $input.change();
                        return false;
                });
                $('body').on('click', '.plus', function () {
                        var $input = $(this).parent().find('input');
                        var count = parseInt($input.val()) + 1;
                        count = count > <?php echo $maxRooms; ?> ? <?php echo $maxRooms; ?> : count;
                        $input.val(count);
                        $input.change();
                        return false;
                });
        })(jQuery)
</script>
