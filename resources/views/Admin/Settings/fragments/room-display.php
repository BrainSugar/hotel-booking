<!--Settings Seciton -->
<div class="settings-section">
        <h4 class="font-weight-light"><?php esc_html_e( 'Display options', 'bshb' ) ?></h4>
        <p class="setting-desc mb-4"><?php esc_html_e( 'Settings related to how your rooms are displayed', 'bshb' ) ?></p>
        <!-- General Info Row -->        
        <div class="row my-5">
                <!-- Display Amenities -->
                <div class="col-sm-6">
                        <div class="input-group">
                                <label class="switch-primary">
                                <input name="Room/display_amenities" value="false" type="hidden">
                                <input type="checkbox" class="switch switch-button" name="Room/display_amenities" id="display_amenities" value="true" <?php if (Brainsugar()->options->get( 'Room.display.display_amenities' ) == 'true') echo ' checked="checked"';?>>
                                <span class="switch-body"></span>
                                <span class="switch-text"><?php esc_html_e( 'Display Amenities', 'bshb' ) ?></span>
                                </label>
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'Display amenities section on your room type post', 'bshb' ) ?></p>
                </div>
                <!-- Display Amenities End -->
                <!-- Display Policies -->
                <div class="col-sm-6">
                        <div class="input-group">
                                <label class="switch-primary">
                                <input name="Room/display_policies" value="false" type="hidden">
                                <input type="checkbox" class="switch switch-button" name="Room/display_policies" id="display_policies" value="true" <?php if (Brainsugar()->options->get( 'Room.display.display_policies' ) == 'true') echo ' checked="checked"';?>>
                                <span class="switch-body"></span>
                                <span class="switch-text"><?php esc_html_e( 'Display policies', 'bshb' ) ?></span>
                                </label>
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'Display policies section on your room type post', 'bshb' ) ?></p>
                </div>
                <!-- Display Policies End -->
        <!-- Row End -->
        </div>
        <hr>
        <p class="setting-desc mb-4"><?php esc_html_e( 'Room Sorting', 'bshb' ) ?></p>
        <!-- Row Start -->
        <div class="row my-4">
                <div class="col-sm-12">
                        <div class="radio">
                                <input type="radio" value="manual" name="Room/sorting" id="sorting_manual" <?php if (Brainsugar()->options->get( 'Room.display.sorting' ) == 'manual') echo ' checked="checked"';?>>
                                <label for="sorting_manual"><?php esc_html_e( 'Manual Order', 'bshb' ) ?></label>
                                <input type="radio" value="alphabetical" name="Room/sorting" id="sorting_alphabet" <?php if (Brainsugar()->options->get( 'Room.display.sorting' ) == 'alphabetical') echo ' checked="checked"';?>>
                                <label for="sorting_alphabet"><?php esc_html_e( 'Alphabetical Order', 'bshb' ) ?></label>
                                 <input type="radio" value="ascending" name="Room/sorting" id="sorting_asc" <?php if (Brainsugar()->options->get( 'Room.display.sorting' ) == 'ascending') echo ' checked="checked"';?>>
                                <label for="sorting_asc"><?php esc_html_e( 'Ascending', 'bshb' ) ?></label>
                                 <input type="radio" value="descending" name="Room/sorting" id="sorting_desc" <?php if (Brainsugar()->options->get( 'Room.display.sorting' ) == 'descending') echo ' checked="checked"';?>>
                                <label for="sorting_desc"><?php esc_html_e( 'Descending', 'bshb' ) ?></label>
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'The order of the rooms to be reserved , Manual order can be changed in the room post type by drag n drop', 'bshb' ) ?></p>
                </div>
        </div>
        <!-- Row End --> 
</div>
<!--Settings Section END-->

