 <!-- Dates Template --> 
 <div class="row">
         <div class="col-sm-6">
                 <div class="check-in-wrapper">
                         <p class="form-heading"><?php echo esc_html('Check In'); ?></p>
                         <div class="input-group">
                                 <input type="text" name="check-in" id="input-check-in" class="input-check-in form-control" placeholder="<?php echo esc_attr('Check-in'); ?>" required/>                               
                         </div>                         
                 </div>
                 <p class="text-danger d-none validate-msg">Please enter your stay dates.</p>
         </div>
         <div class="col-sm-6">
                 <div class="check-out-wrapper">
                         <p class="form-heading"><?php echo esc_html('Check Out'); ?></p>
                         <div class="input-group">
                                 <input type="text" name="check-out" id="input-check-out" class="input-check-out form-control" placeholder="<?php echo esc_attr('Check-out'); ?>" required/>
                         </div>
                 </div>
         </div>
 </div>