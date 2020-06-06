<!--Settings Seciton -->
<div class="settings-section">
        <h4 class="font-weight-light"><?php esc_html_e( 'Hotel', 'bshb' ) ?></h4>
        <p class="setting-desc mb-4"><?php esc_html_e( 'General information about your hotel', 'bshb' ) ?></p>
        <!-- General Info Row -->
        <div class="row my-4">
                <!-- Hotel Name -->
                <div class="col-sm-4">
                        <div class="input-group">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                                <i class="fad fa-home"></i>
                                        </span>
                                </div>
                                <input type="text" maxlength="75" name="General/hotel_name" id="hotel_name" class="form-control" placeholder="<?php echo esc_attr('Hotel Name'); ?>" value="<?php echo esc_attr(Brainsugar()->options->get('General.hotel.name')); ?>" />
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'The name of your Hotel', 'bshb' ) ?></p>
                </div>
                <!-- Hotel Name End -->
        </div>
        <!-- General Info Row  End-->
        <hr>
        <p class="setting-desc"><?php esc_html_e( 'Address of your hotel', 'bshb' ) ?></p>
        <!-- Hotel Address Row -->
        <div class="row my-4">
                <!-- Hotel Address 1 -->
                <div class="col-sm-4">
                        <div class="input-group">
                                <input type="text" maxlength="75" name="General/hotel_address_line_1" id="address_line_1" class="form-control" placeholder="<?php echo esc_attr('Address 1'); ?>" value="<?php echo esc_attr_e(Brainsugar()->options->get( 'General.hotel.address_line_1' )); ?>" />
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'Address line 1', 'bshb' ) ?></p>
                </div>
                <!-- Hotel Address 1 End -->
                <!-- Hotel Address 2 -->
                <div class="col-sm-4">
                        <div class="input-group">
                                <input type="text" maxlength="75" name="General/hotel_address_line_2" id="address_line_2" class="form-control" placeholder="<?php echo esc_attr('Address 2'); ?>" value="<?php echo esc_attr(Brainsugar()->options->get( 'General.hotel.address_line_2' )); ?>" />
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'Address line 2', 'bshb' ) ?></p>
                </div>
                <!-- Hotel Address 2 End -->
        </div>
        <div class="row my-4">
                <!-- Hotel City -->
                <div class="col-sm-4">
                        <div class="input-group">
                                <input type="text" maxlength="75" name="General/hotel_city" id="hotel_city" class="form-control" placeholder="<?php echo esc_attr('City'); ?>" value="<?php echo esc_attr(Brainsugar()->options->get( 'General.hotel.city' )); ?>" />
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'Locality of your hotel', 'bshb' ) ?></p>
                </div>
                <!-- Hotel City End-->
                <!-- Hotel Country -->
                <div class="col-sm-4">
                        <div class="input-group">
                                <select name="General/hotel_country" id="hotel_country" class="form-control">
                                        <option><?php esc_html_e( 'Select Country', 'bshb' ); ?></option>
                                        <?php foreach($countries as $country) { ?>
                                        <option value="<?php echo $country; ?>" <?php if (Brainsugar()->options->get( 'General.hotel.country' ) == $country) echo ' selected="selected"';?>><?php echo $country; ?></option>
                                        <?php } ?>
                                </select>
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'Country your hotel is located in', 'bshb' ) ?></p>
                </div>
                <!-- Hotel Country End -->
                <!-- Hotel Postcode -->
                <div class="col-sm-4">
                        <div class="input-group">
                                <input type="text" maxlength="30" name="General/hotel_postcode" id="hotel_postcode" class="form-control" placeholder="<?php echo esc_attr('Postcode'); ?>" value="<?php echo esc_attr(Brainsugar()->options->get( 'General.hotel.postcode' )); ?>" />
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'Postcode for your hotel', 'bshb' ) ?></p>
                </div>
                <!-- Hotel Postcode End-->
        </div>
        <!-- Hotel Address Row -->
        <hr>
        <p class="setting-desc"><?php esc_html_e( 'Communication for your hotel', 'bshb' ) ?></p>
        <div class="row my-4">
                <!-- Hotel Phone -->
                <div class="col-sm-4">
                        <div class="input-group">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                                <i class="fad fa-phone"></i>
                                        </span>
                                </div>
                                <input type="tel" maxlength="30" name="General/hotel_phone" id="hotel_phone" class="form-control" placeholder="<?php echo esc_attr('Phone'); ?>" value="<?php echo esc_attr(Brainsugar()->options->get( 'General.hotel.phone' )); ?>" />
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'Telephone number', 'bshb' ) ?></p>
                </div>
                <!-- Hotel Phone End-->
                <!-- Hotel Email -->
                <div class="col-sm-4">
                        <div class="input-group">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                                <i class="fad fa-envelope"></i>
                                        </span>
                                </div>
                                <input type="email" maxlength="50" name="General/hotel_email" id="hotel_email" class="form-control" placeholder="<?php echo esc_attr('E-Mail'); ?>" value="<?php echo esc_attr(Brainsugar()->options->get( 'General.hotel.email' )); ?>" />
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'Email Address', 'bshb' ) ?></p>
                </div>
                <!-- Hotel Email End-->
        </div>
</div>
<!--Settings Section END-->