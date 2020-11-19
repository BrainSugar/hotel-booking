                <div class="modal-dialog" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title"><?php echo esc_html('Reservation ID - #' . $reservation['reservation_id']); ?></h5>
                                </div>
                                <div class="modal-body">
                                        <div class="row">
                                                <div class="col-sm-6 ">
                                                <h5 class="guest-name"><?php echo esc_html($guest['guest_first_name'] . ' ' . $guest['guest_last_name']); ?></h5>
                                                <p class="arriva m-0"><?php echo esc_html($guest['guest_address_1']);  ?></p>
                                                <p class="checkout"><?php echo esc_html($guest['guest_address_2'] . ' , ' . $guest['guest_city']);  ?></p>
                                        </div>
                                        <div class="col-sm-6 ">                                                                
                                                                <ul class="timeline">
                                                                <li class="event">
                                                                                <p class="left">Check In</p>
                                                                                <h6 class = "right range-start font-weight-light"><?php echo esc_html($reservation['check_in']); ?></h6>
                                                                </li>    
                                                                <li class="event">
                                                                                <p class="left">Check Out</p>
                                                                                <h6 class = "right range-end font-weight-light"><?php echo esc_html($reservation['check_out']); ?></h6>
                                                                </li>    
                                                                </ul>                                                                                                            
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

