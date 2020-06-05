<div class="settings-container">
        <h2 class="font-weight-light"><?php esc_html_e( 'General Settings', 'bshb' ) ?></h2>

  <?php echo Brainsugar()->view( 'Admin.Settings.fragments.general-hotel' )->with('countries', $countries); ?>

        <!-- Settings Section -->
        <div class="settings-section">
                <h4 class="font-weight-light"><?php esc_html_e( 'Currency', 'bshb' ) ?></h4>
                <p class="setting-desc mb-4"><?php esc_html_e( 'Your hotel currency settings', 'bshb' ) ?></p>
                <!-- Currency Row -->
                <div class="row my-4">
                 <!-- Hotel Currency -->
                        <div class="col-sm-4">                               
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
                        </div>
                <!-- Hotel Currency End -->
                <!-- Currency display -->
                <div class="col-sm-8 text-center">
                        <h3 class="setting-desc font-weight-light"><?php echo esc_html($currencyDisplay); ?></h3>                               
                         <p class="option-desc"><?php esc_html_e( 'Your currency will be diplayed in this format', 'bshb' ) ?></p>
                        </div>
                <!--  Currency display End-->
                </div>
                <hr>
                <p class="setting-desc mb-4"><?php esc_html_e( 'Currency symbol and separators', 'bshb' ) ?></p>
                <div class="row my-4">                         
                        <div class="col-sm-4">
                                <div class="radio">
                                        <input type="radio" value="before" name="General/symbol_position" id="before" <?php if (Brainsugar()->options->get( 'General.currency.symbol_position' ) == 'before') echo ' checked="checked"';?>>
                                        <label for="before">Before</label>
                                        <input type="radio" value="after" name="General/symbol_position" id="after"  <?php if (Brainsugar()->options->get( 'General.currency.symbol_position' ) == 'after') echo ' checked="checked"';?>>
                                        <label for="after">After</label>
                                </div>
                                <p class="option-desc"><?php esc_html_e( 'Currency symbol position', 'bshb' ) ?></p>
                        </div>
                        <!-- Symbol position End -->
                         <!-- Decimals-->
                        <div class="col-sm-2">
                                <div class="input-group">
                                        <input type="number" max="5" min="0" name="General/currency_decimals" id="decimals" class="form-control" value="<?php echo esc_attr(Brainsugar()->options->get( 'General.currency.decimals' )); ?>" />
                                </div>
                                <p class="option-desc"><?php esc_html_e( 'Decimals', 'bshb' ) ?></p>
                        </div>
                        <!-- Decimal End-->
                        <!-- Decimal seperator-->
                        <div class="col-sm-3">
                                <div class="input-group">
                                        <input type="text" maxlength="1" name="General/decimal_separator" id="decimal_separator" class="form-control" placeholder="Decimal Separator" value="<?php echo esc_attr(Brainsugar()->options->get( 'General.currency.decimal_separator' )); ?>" />
                                </div>
                                <p class="option-desc"><?php esc_html_e( 'Decimal Separator', 'bshb' ) ?></p>
                        </div>
                        <!-- Decimal separatorEnd-->
                         <!-- Thousand seperator-->
                        <div class="col-sm-3">
                                <div class="input-group">
                                        <input type="text" maxlength="1" name="General/thousands_separator" id="thousands_separator" class="form-control" placeholder="Thousands Separator" value="<?php echo esc_attr(Brainsugar()->options->get( 'General.currency.thousands_separator' )); ?>" />
                                </div>
                                <p class="option-desc"><?php esc_html_e( 'Thousands Separator', 'bshb' ) ?></p>
                        </div>
                        <!-- Thousand separatorEnd-->                    
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