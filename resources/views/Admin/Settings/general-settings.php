<div class="settings-container">
        <h2 class="font-weight-light">General settings</h2>
        <div class="settings-section">
                <h4 class="font-weight-light">Hotel Info</h4>
                <p>This info is displayed on the Hotel page.</p>
                <div class="row mt-3">
                        <div class="col-sm-4">
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" name="Hotel/name_of_the_hotel" id="Hotel/name_of_the_hotel" class="form-control" placeholder="Hotel Name" value="<?php echo $plugin->options->get( 'Hotel/name_of_the_hotel' ); ?>" />
                                </div> 
                        </div>
                        <div class="col-sm-4">
                               <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" name="Hotel/address_line_1" id="Hotel/address_line_1" class="form-control" placeholder="Address 1" value="<?php echo $plugin->options->get( 'Hotel/address_line_1' ); ?>" />
                                </div>                                 
                        </div>
                        <div class="col-sm-4">
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" name="Hotel/address_line_2" id="Hotel/address_line_2" class="form-control" placeholder="Address 2" value="<?php echo $plugin->options->get( 'Hotel/address_line_2' ); ?>" />
                                </div>
                        </div>
                </div>
        </div>
</div>