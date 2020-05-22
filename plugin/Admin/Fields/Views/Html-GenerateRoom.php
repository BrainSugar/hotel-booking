<!-- Brainsugar Hotel Booking Wrapper -->
<div class="bshb" id="bshb-room-field" data-post-id="<?php echo esc_attr( $post_id ) ?>">
        <div class="container-fluid">
                <div id="room-generate-<?php echo esc_attr( $post_id ) ?>">
                        <div class="row">
                                <!-- Number of Room Input Field -->
                                <div class="col-sm-6 d-flex">
                                        <div class="input-wrapper d-flex m-auto">
                                                <!-- Minus Button -->
                                                <span class="minus cursor-pointer">
                                                        <i class='fad fa-minus'></i>
                                                </span>
                                                <?php echo $inputRoomNumber; ?>
                                                <!-- Plus button -->
                                                <span class="plus  cursor-pointers">
                                                        <i class='fad fa-plus'></i>
                                                </span>
                                        </div>
                                </div>
                                <div class="col-sm-6 d-flex">
                                        <p class="m-auto"><?php _e("Enter the Number of rooms you want this room type to have."); ?></p>
                                </div>
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







                <!-- Sortable room list -SortableJS -->







        </div><!-- End : Brainsugar Hotel Booking Wrapper -->
