
<div class="settings-section">
        <h4 class="font-weight-light"><?php esc_html_e( 'Room Attributes', 'bshb' ) ?></h4>
        <p class="setting-desc mb-4"><?php esc_html_e( 'Specify the attributes for your room', 'bshb' ) ?></p>
               <!-- Row Start -->
        <div class="row my-4">
        <!-- Max Rooms -->
           <div class="col-sm-6">
                        <div class="input-group w-50">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                                <i class="fad fa-home"></i>
                                        </span>
                                </div>
                                <input type="number" max="50" min="1" name="Room/max_rooms" id="max_rooms" class="form-control" value="<?php echo esc_attr(Brainsugar()->options->get( 'Room.max_rooms' )); ?>" />
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'Maximum rooms a Room type can have', 'bshb' ) ?></p>
                </div>
        <!-- Max Rooms -->
        <!-- Room size units -->
                <div class="col-sm-6">
                          <div class="input-group w-50">
                                <select name="Room/size_unit" id="size_unit" class="form-control">                                       
                                        <option value="ft" <?php if (Brainsugar()->options->get( 'Room.size_unit' ) == 'ft') echo ' selected="selected"';?>><?php echo esc_html_e( 'Square feet (ft²)', 'bshb' ) ?></option>
                                        <option value="mt" <?php if (Brainsugar()->options->get( 'Room.size_unit' ) == 'mt') echo ' selected="selected"';?>><?php echo esc_html_e( 'Square Meters (m²)', 'bshb' ) ?></option>
                                </select>
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'Measurement Unit for your Room size', 'bshb' ) ?></p>
                </div>
        <!-- Room size units -->
        </div>
        <!-- Row End -->

</div>