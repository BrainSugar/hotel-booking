
<div class="settings-section">
        <h4 class="font-weight-light"><?php esc_html_e( 'Booking process', 'bshb' ) ?></h4>
        <p class="setting-desc mb-4"><?php esc_html_e( 'Settings related to the process of booking a reservation', 'bshb' ) ?></p>
<!-- Row Start -->
        <div class="row my-4">
        <div class="col-sm-12">
                        <div class="radio">
                                <input type="radio" value="manual" name="Room/sorting" id="sorting_manual" <?php if (Brainsugar()->options->get( 'Room.display.sorting' ) == 'manual') echo ' checked="checked"';?>>
                                <label for="sorting_manual"><?php esc_html_e( 'Instant Booking', 'bshb' ) ?></label>
                                <input type="radio" value="alphabetical" name="Room/sorting" id="sorting_alphabet" <?php if (Brainsugar()->options->get( 'Room.display.sorting' ) == 'alphabetical') echo ' checked="checked"';?>>
                                <label for="sorting_alphabet"><?php esc_html_e( 'Manual Booking', 'bshb' ) ?></label>
                                 <input type="radio" value="ascending" name="Room/sorting" id="sorting_asc" <?php if (Brainsugar()->options->get( 'Room.display.sorting' ) == 'ascending') echo ' checked="checked"';?>>
                                <label for="sorting_asc"><?php esc_html_e( 'Disable Booking', 'bshb' ) ?></label>
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'Instant : Guests can check out from the front end , Manual : Admin will have to approve reservations manually , Disabled : Show only the rooms and disable reservations', 'bshb' ) ?></p>                        
                </div>
        </div>
<!-- Row End -->
<hr>
<p class="setting-desc mb-4"><?php esc_html_e( 'Reservation Rules', 'bshb' ) ?></p>
<!-- Row Start -->
        <div class="row my-4">
        <!-- Minimum nights -->
           <div class="col-sm-4">
                        <div class="input-group w-50">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                                <i class="fad fa-home"></i>
                                        </span>
                                </div>
                                <input type="number" max="50" min="1" name="Room/max_rooms" id="max_rooms" class="form-control" value="<?php echo esc_attr(Brainsugar()->options->get( 'Room.max_rooms' )); ?>" />
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'Minimum nights of stay', 'bshb' ) ?></p>
                </div>
        <!-- minimum nights -->
        <!-- Maximum nights -->
           <div class="col-sm-4">
                        <div class="input-group w-50">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                                <i class="fad fa-home"></i>
                                        </span>
                                </div>
                                <input type="number" max="50" min="1" name="Room/max_rooms" id="max_rooms" class="form-control" value="<?php echo esc_attr(Brainsugar()->options->get( 'Room.max_rooms' )); ?>" />
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'Maximum nights of stay', 'bshb' ) ?></p>
                </div>
        <!-- Maximum nights -->
                <!-- days in advance -->
           <div class="col-sm-4">
                        <div class="input-group w-50">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                                <i class="fad fa-home"></i>
                                        </span>
                                </div>
                                <input type="number" max="50" min="1" name="Room/max_rooms" id="max_rooms" class="form-control" value="<?php echo esc_attr(Brainsugar()->options->get( 'Room.max_rooms' )); ?>" />
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'Accept bookings if booked only these many days before Arrival date', 'bshb' ) ?></p>
                </div>
        <!-- days in advance -->
        </div>
<!-- Row End -->
</div>