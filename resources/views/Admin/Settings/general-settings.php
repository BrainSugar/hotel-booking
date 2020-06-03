<div class="settings-container">
        <h2 class="font-weight-light"><?php esc_html_e( 'General Settings', 'bshb' ) ?></h2>


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
                                        <input type="text" maxlength="75" name="General/hotel_address_line_1" id="Hotel/address_line_1" class="form-control" placeholder="<?php echo esc_attr('Address 1'); ?>" value="<?php echo esc_attr(Brainsugar()->options->get( 'General.hotel.address_line_1' )); ?>" />
                                </div>
                                <p class="option-desc"><?php esc_html_e( 'Address line 1', 'bshb' ) ?></p>
                        </div>
                        <!-- Hotel Address 1 End -->
                        <!-- Hotel Address 2 -->
                        <div class="col-sm-4">
                                <div class="input-group">
                                        <input type="text" maxlength="75" name="General/hotel_address_line_2" id="Hotel/address_line_2" class="form-control" placeholder="<?php echo esc_attr('Address 2'); ?>" value="<?php echo esc_attr(Brainsugar()->options->get( 'General.hotel.address_line_2' )); ?>" />
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

        <!-- Settings Section -->
        <div class="settings-section">
                <h4 class="font-weight-light"><?php esc_html_e( 'Currency', 'bshb' ) ?></h4>
                <p class="setting-desc mb-4"><?php esc_html_e( 'Your hotel currency settings', 'bshb' ) ?></p>
                <!-- Currency Row -->
                <div class="row my-4">
                        <div class="col-sm-4">
                                <!-- Hotel Currency -->
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                        <i class="fad fa-home"></i>
                                                </span>
                                        </div>
                                        <select name="General/hotel_currency" id="hotel_currency" class="form-control">
                                                <option><?php esc_html_e( 'Select Currency', 'bshb' ); ?></option>
                                                <?php foreach($currencies as $currency) { ?>
                                                <option value="<?php echo $currency['code']; ?>" <?php if (Brainsugar()->options->get( 'General.currency.code' ) == $currency['code']) echo ' selected="selected"';?>><?php echo $currency['name'] . ' - ' . $currency['symbol'];?></option>
                                                <?php } ?>
                                        </select>
                                </div>
                                <p class="option-desc"><?php esc_html_e( 'The Currency of your Hotel', 'bshb' ) ?></p>
                        </div> <!-- Hotel Currency End -->
                </div>
                <hr>
                <p class="setting-desc mb-4"><?php esc_html_e( 'Currency symbol and separators', 'bshb' ) ?></p>
                <div class="row my-4">                         
                        <div class="col-sm-4">
                                <div class="radio">
                                        <input type="radio" value="yes" name="optionyes" id="yes">
                                        <label for="yes">Before</label>
                                        <input type="radio" checked="checked" value="no" name="optionyes" id="no">
                                        <label for="no">After</label>
                                </div>
                                <p class="option-desc"><?php esc_html_e( 'Currency symbol position', 'bshb' ) ?></p>
                        </div>
                        <!-- Symbol position End -->
                         <!-- Decimals-->
                        <div class="col-sm-2">
                                <div class="input-group">
                                        <input type="number" max="5" min="0" name="General/hotel_city" id="hotel_city" class="form-control" value="2" />
                                </div>
                                <p class="option-desc"><?php esc_html_e( 'Decimals', 'bshb' ) ?></p>
                        </div>
                        <!-- Decimal End-->
                         <!-- Thousand seperator-->
                        <div class="col-sm-3">
                                <div class="input-group">
                                        <input type="text" maxlength="1" name="General/hotel_city" id="hotel_city" class="form-control" placeholder="Thousands Separator" value="," />
                                </div>
                                <p class="option-desc"><?php esc_html_e( 'Thousands Separator', 'bshb' ) ?></p>
                        </div>
                        <!-- Thousand separatorEnd-->
                        <!-- Decimal seperator-->
                        <div class="col-sm-3">
                                <div class="input-group">
                                        <input type="text" maxlength="1" name="General/hotel_city" id="hotel_city" class="form-control" placeholder="Thousands Separator" value="." />
                                </div>
                                <p class="option-desc"><?php esc_html_e( 'Decimal Separator', 'bshb' ) ?></p>
                        </div>
                        <!-- Decimal separatorEnd-->
                </div>



        </div><!-- Section-end -->
</div><!-- Settings container End -->


















<!-- 

                          

    <div class="input-group">
  <label class="switch-primary">
    <input type="checkbox" class="switch switch-button" name="status" id="" value="1" checked="checked">
    <span class="switch-body"></span>
    <span class="switch-text">Enable Tax</span>
  </label>
</div>

                        </div>
                </div>
                <div class="row my-3">
                         <div class="col-sm-4">
                         <div class="radio radio-warning">
                      <input type="radio" value="yes" name="optionyes" id="yes">
                      <label for="yes">Agree</label>
                      <input type="radio" checked="checked" value="no" name="optionyes" id="no">
                      <label for="no">Disagree</label>
                    </div>
                    <div class="checkbox  checkbox-circle">
                      <input type="checkbox" checked="checked" value="1" id="checkbox7">
                      <label for="checkbox7">Keep Me Signed in</label>
                    </div>
                    <div class="input-group">
                    <select class="form-control" id="exampleFormControlSelect2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
    </div> -->