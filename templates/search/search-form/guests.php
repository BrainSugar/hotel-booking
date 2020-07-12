<?php

        $children_bookable = Brainsugar()->options->get('Reservation.children_bookable');
        $maxRooms = 5;
?>
<div class="guests">
        <p class="form-heading"><?php echo esc_html('Guests'); ?></p>
        <div class="row">
                <div class="col guest-input">
                        <div class="input-wrapper d-flex m-auto">
                                <!-- Minus Button -->
                                <span class="minus cursor-pointer">
                                        <i class='fad fa-minus'></i>
                                </span>
                                <input type="number" class="quantity-number" name="bshb_generate_room" id="inputRoomNumber" value="2" max="8" min="0" required>
                                <!-- Plus button -->
                                <span class="plus  cursor-pointers">
                                        <i class='fad fa-plus'></i>
                                </span>                                
                        </div>    
                        <p class="guests-title"><?php echo esc_html('Adults' , 'bshb') ?></p>                  
                </div>
                <div class="col guest-input">
                        <div class="input-wrapper d-flex m-auto">
                                <!-- Minus Button -->
                                <span class="minus cursor-pointer">
                                        <i class='fad fa-minus'></i>
                                </span>
                                <input type="number" class="quantity-number" name="bshb_generate_room" id="inputRoomNumber" value="0" max="8" min="0" readonly="readonly">
                                <!-- Plus button -->
                                <span class="plus  cursor-pointers">
                                        <i class='fad fa-plus'></i>
                                </span>
                        </div>
                        <p class="guests-title"><?php echo esc_html('Children' , 'bshb') ?></p>
                </div>
        </div>
</div>


<!-- 

        <div class="col-sm-12">
                <div class="guests-selected">
                        <h1 class="adults">2</h1>
                        <p>Adults</p>
                        <?php if($children_bookable == "true") { ?>
                                <h1 class="children">0</h1>
                                <p>Children</p>
                        <?php } ?>
                </div>
        </div>
</div>
        <div class="row ">
        <div class="col-sm-12">
        <div class="input-group">
                                <label>Adults</label>
                                <input type="number" id="adults" value= "2" class="form-control" required>
        </div>
                
        </div>
        <?php if($children_bookable == "true") { ?>
                <div class="col-sm-12">
                        <input type="number" id="children" value="0" class="form-control" required>
                </div>
        <?php } ?>
        </div>
</div> -->
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
