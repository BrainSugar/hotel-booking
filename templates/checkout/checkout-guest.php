<?php $countries = bshb_get_countries(); ?>
<div class="guest-container">
        <h1 class="display-4 mb-5"><?php echo esc_html('Guest Details' , 'bshb'); ?></h1>

        <form class="p-4" action="" id="guest-information" method="post">
        <h3 class="mb-4 font-weight-light"><?php echo esc_html('Personal Information' , 'bshb'); ?></h3>

        <div class="row p-2 my-5 mx-2">

                <!-- Guest First Name -->
                <div class="col-sm-5 my-2">                
                        <div class="input-group">               
                                <input name="guest_first_name" id="guest_first_name" type="text" class="form-control" placeholder="<?php echo esc_html('First Name' , 'bshb'); ?>">
                        </div>
                </div>
                <!-- End Guest First Name -->

                <!-- Guest Last Name -->
                 <div class="col-sm-5 my-2">                
                        <div class="input-group">               
                                <input name="guest_last_name" id="guest_last_name" type="text" class="form-control" placeholder="<?php echo esc_html('Last Name' , 'bshb'); ?>">
                        </div>
                </div>
                <!-- End Guest Last Name -->
        </div>

        <hr>

         <h3 class="my-4 font-weight-light"><?php echo esc_html('Contact Information' , 'bshb'); ?></h3>

        <div class="row my-5 mx-2">
                <!-- Guest Email -->
                <div class="col-sm-5 my-2">
                        <div class="input-group">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                                <i class="fad fa-at"></i>
                                        </span>
                                </div>
                                <input name="guest_email" id="guest_email" type="email" class="form-control" placeholder="<?php echo esc_html('Email Address' , 'bshb'); ?>">
                        </div>
                </div>
                <!-- End Guest Email -->
                <!-- Guest Phone number -->
                <div class="col-sm-5 my-2">                
                        <div class="input-group">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                                <i class="fad fa-phone"></i>
                                        </span>
                                </div>
                                <input name="guest_phone" id="guest_phone" type="number" class="form-control" placeholder="<?php echo esc_html('Phone Number' , 'bshb'); ?>">
                        </div>                        
                </div>
                <!-- End Guest Phone number -->
        </div>

        <hr>

        <h3 class="my-4 font-weight-light"><?php echo esc_html('Billing Address' , 'bshb'); ?></h3>

                <div class="row my-5 mx-2">
                        <!-- Guest Address 1 -->
                        <div class="col-sm-6 my-2">
                                <div class="input-group">
                                        <input name = "guest_address_1" id="guest_address_1" type="text" class="form-control" placeholder="<?php echo esc_html('Address Line 1' , 'bshb'); ?>">
                                </div>
                        </div>
                        <!-- End Guest Address 1 -->
                        <!-- Guest Address 2 -->
                        <div class="col-sm-6 my-2">
                                <div class="input-group">
                                        <input name="guest_address_2" id="guest_address_2" type="text" class="form-control" placeholder="<?php echo esc_html('Address Line 2 (optional)' , 'bshb'); ?>">
                                </div>                        
                        </div>
                        <!-- End Guest Address 2 -->
                </div>

                <div class="row mx-2">
                        <!-- Guest City -->
                        <div class="col-sm-4 my-2">
                                <div class="input-group">
                                        <input name="guest_city" id="guest_city" type="text" class="form-control" placeholder="<?php echo esc_html('City' , 'bshb'); ?>">
                                </div>                        
                        </div>
                        <!-- End Guest City -->
                        <!-- Guest Country -->
                        <div class="col-sm-4 my-2">
                                <div class="input-group">
                                        <select name="guest_country" id="guest_country" class="form-control">
                                                <option value=""><?php esc_html_e( 'Select Country', 'bshb' ); ?></option>
                                                <?php foreach($countries as $country) { ?>
                                                        <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                                                <?php } ?>
                                        </select>
                                </div>
                        </div>
                        <!-- End Guest Country -->
                        <!-- Guest Postcode -->
                        <div class="col-sm-4 my-2">                        
                                <div class="input-group">
                                        <input name="guest_postcode" type="number" class="form-control" placeholder="<?php echo esc_html('Postcode / Zip' , 'bshb'); ?>">
                                </div>
                        </div>
                        <!-- End Guest Postcode -->
                </div>
        </form>
</div>