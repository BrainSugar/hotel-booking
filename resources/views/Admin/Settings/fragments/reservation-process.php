
<div class="settings-section">
        <h4 class="font-weight-light"><?php esc_html_e( 'Booking process', 'bshb' ) ?></h4>
        <p class="setting-desc mb-4"><?php esc_html_e( 'Settings related to the process of booking a reservation', 'bshb' ) ?></p>
<!-- Row Start -->
        <div class="row my-4">
        <div class="col-sm-12">
                        <div class="radio">
                                <input type="radio" value="instant" name="Reservation/mode" id="mode_instant" <?php if (Brainsugar()->options->get( 'Reservation.mode' ) == 'instant') echo ' checked="checked"';?>>
                                <label for="mode_instant"><?php esc_html_e( 'Instant Booking', 'bshb' ) ?></label>
                                <input type="radio" value="manual" name="Reservation/mode" id="mode_manual" <?php if (Brainsugar()->options->get( 'Reservation.mode' ) == 'manual') echo ' checked="checked"';?>>
                                <label for="mode_manual"><?php esc_html_e( 'Manual Booking', 'bshb' ) ?></label>
                                 <input type="radio" value="disable" name="Reservation/mode" id="mode_disabled" <?php if (Brainsugar()->options->get( 'Reservation.mode' ) == 'disable') echo ' checked="checked"';?>>
                                <label for="mode_disabled"><?php esc_html_e( 'Disable Booking', 'bshb' ) ?></label>
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
                                <input type="number" name="Reservation/min_nights" id="min_nights" class="form-control" value="<?php echo esc_attr(Brainsugar()->options->get( 'Reservation.rules.min_nights' )); ?>" />
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
                                <input type="number" name="Reservation/max_nights" id="max_nights" class="form-control" value="<?php echo esc_attr(Brainsugar()->options->get( 'Reservation.rules.max_nights' )); ?>" />
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
                                <input type="number" name="Reservation/advance_days" id="advance_days" class="form-control" value="<?php echo esc_attr(Brainsugar()->options->get( 'Reservation.rules.advance_days' )); ?>" />
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'Accept bookings if booked only these many days before Arrival date', 'bshb' ) ?></p>
                </div>
        <!-- days in advance -->
        </div>
<!-- Row End -->
</div>