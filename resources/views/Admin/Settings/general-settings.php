<div class="settings-container">
        <h2 class="font-weight-light"><?php esc_html_e( 'General Settings', 'bshb' ) ?></h2>
<!--Settings Seciton -->
        <div class="settings-section">
                <h4 class="font-weight-light"><?php esc_html_e( 'Hotel', 'bshb' ) ?></h4>
                <p class="setting-desc mb-4"><?php esc_html_e( 'General information about your hotel', 'bshb' ) ?></p>
                <div class="row">
                <!-- Hotel Name -->
                        <div class="col-sm-4">
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" maxlength="75" name="General/hotel_name" id="hotel_name" class="form-control" placeholder="<?php echo esc_attr('Hotel Name'); ?>" value="<?php echo esc_attr(Brainsugar()->options->get('General.hotel_name')); ?>" />
                                </div>
                                <p class="option-desc"><?php esc_html_e( 'The name of your Hotel', 'bshb' ) ?></p>
                        </div>
                <!-- Hotel Name End -->
                </div>
                <hr>
                <p class="setting-desc"><?php esc_html_e( 'Address of your Hotel', 'bshb' ) ?></p>
                <div class="row my-3">
                <!-- Hotel Address 1 -->
                        <div class="col-sm-4">
                                <div class="input-group">
                                        <input type="text" maxlength="75" name="General/hotel_address_line_1" id="Hotel/address_line_1" class="form-control" placeholder="<?php echo esc_attr('Address 1'); ?>" value="<?php echo esc_attr(Brainsugar()->options->get( 'General.hotel_address_line_1' )); ?>" />
                                </div>
                                <p class="option-desc"><?php esc_html_e( 'Address line 1', 'bshb' ) ?></p>
                        </div>
                <!-- Hotel Address 1 End -->
                <!-- Hotel Address 2 -->
                        <div class="col-sm-4">
                                <div class="input-group">
                                        <input type="text" maxlength="75" name="General/hotel_address_line_2" id="Hotel/address_line_2" class="form-control" placeholder="<?php echo esc_attr('Address 2'); ?>" value="<?php echo esc_attr(Brainsugar()->options->get( 'General.hotel_address_line_2' )); ?>" />
                                </div>
                                <p class="option-desc"><?php esc_html_e( 'Address line 2', 'bshb' ) ?></p>
                        </div>
                <!-- Hotel Address 2 End -->
                </div>
                <div class="row my-3">
                 <!-- Hotel City -->
                        <div class="col-sm-4">
                                <div class="input-group">
                                        <input type="text" maxlength="75" name="General/hotel_city" id="hotel_city" class="form-control" placeholder="<?php echo esc_attr('City'); ?>" value="<?php echo esc_attr(Brainsugar()->options->get( 'General.hotel_city' )); ?>" />
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
                                        <option value = "<?php echo $country; ?>" <?php if (Brainsugar()->options->get( 'General.hotel_country' ) == $country) echo ' selected="selected"';?>><?php echo $country; ?></option>   
                                        <?php } ?>
                                        </select>
                                </div>
                                <p class="option-desc"><?php esc_html_e( 'Country your hotel is located in', 'bshb' ) ?></p>
                        </div>
                <!-- Hotel Country End -->
                 <!-- Hotel Postcode -->
                        <div class="col-sm-4">
                                <div class="input-group">
                                        <input type="text" maxlength="20" name="General/hotel_postcode" id="hotel_postcode" class="form-control" placeholder="<?php echo esc_attr('Postcode'); ?>" value="<?php echo esc_attr(Brainsugar()->options->get( 'General.hotel_postcode' )); ?>" />
                                </div>
                                <p class="option-desc"><?php esc_html_e( 'Postcode for your hotel', 'bshb' ) ?></p>
                        </div>
                 <!-- Hotel Postcode End-->                
                </div>
        </div>
<!--Settings Seciton -->
</div>



















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
