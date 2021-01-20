<div class="modal-dialog" role="document">
        <!--Start Reservation Popup  -->
        <div class="reservation-popup">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title"><?php echo esc_html('Reservation ID - #' . $reservation['reservation_id']); ?></h5>
                                <hr>
                        </div>
                        <div class="modal-body">
                                <div class="row">
                                        <div class="col-sm-12">
                                                <!-- Guest Name -->
                                                        <h5 class="guest-name font-weight-light"><?php echo esc_html($guest['guest_first_name'] . ' ' . $guest['guest_last_name']); ?></h5>
                                        </div>
                                        <div class="col-sm-6 ">
                                                <!-- Guest Phone Number -->
                                                <div class="guest-phone">
                                                        <i class="fad fa-phone   icon-dark" title="Guest Email Address"></i>
                                                        <a href="tel:<?php echo esc_html($guest['guest_phone']);  ?>"><?php echo esc_html($guest['guest_phone']);  ?></a>                                                        
                                                </div>
                                                <!-- Guest Email -->
                                                <div class="guest-email">
                                                        <i class="fad fa-envelope   icon-dark" title="Guest Email Address"></i>
                                                        <a href="mailto:<?php echo esc_html($guest['guest_email']);  ?>"><?php echo esc_html($guest['guest_email']);  ?></a>                                                
                                                </div>
                                        </div>
                                        <div class="col-sm-6 ">
                                                <ul class="timeline">
                                                        <li class="event">
                                                                <p class="left"><?php echo esc_html('Check In'); ?></p>
                                                                <h6 class="right range-start font-weight-light"><?php echo esc_html($reservation['check_in']); ?></h6>
                                                        </li>
                                                        <li class="event">
                                                                <p class="left"><?php echo esc_html('Check Out'); ?></p>
                                                                <h6 class="right range-end font-weight-light"><?php echo esc_html($reservation['check_out']); ?></h6>
                                                        </li>
                                                </ul>
                                        </div>
                                </div>
                                <hr>
                                <div class="row ">                                
                                        <div class="col-sm-6">
                                                <h6 class="font-weight-light">Reservation Status</h6>
                                                <div class="reservation-status">
                                                        <span class="status <?php echo esc_html($reservation['reservation_status']); ?>"></span>
                                                        <p><?php echo esc_html($reservation['reservation_status']); ?></p>
                                                </div>                                                
                                        </div>
                                        <div class="col-sm-6">
                                                <h6 class="font-weight-light">Payment Status</h6>
                                                <div class="payment-status">
                                                        <span class="status"></span>
                                                        <p class="">Pay At Desk</p>
                                                </div>                                        
                                        </div>
                                </div>
                                <hr>
                        </div>                       
                        <div class="modal-footer">
                                <button id="add-modal-button" type="submit" class="btn btn-primary">Edit Reservation</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                </div>
        </div>
        <!--end Reservation Popup  -->
</div>
