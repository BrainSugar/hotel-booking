   <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title"><?php echo esc_html('Add a new room'); ?></h5>                                
                        </div>
                        
                        <div class="modal-body">
                              <div class="col-sm-12 my-2">     
                              
                              <!-- TODO -->
                              <!-- If max rooms then display cant add anymore -->
                              <?php if(count($roomUnits) < $maxRooms) { 
                                      $inputStatus = "required"; ?>
                              
                                        <div class="input-group">                                                
                                                <input id="room-name-modal-input" type="text" placeholder="Enter room name." class="form-control" maxlength = "25" >                                      
                                        </div>
                              <?php } else {  $inputStatus= "disabled"; ?>

                                
                                <p>This room type has reached maximum number of rooms it can have.</p>
                                <small>Change the limit in settings.</small>
                              <?php } ?>
                                </div>
                        </div>
                        <div class="modal-footer">
                                <span class="add-room-spinner spinner"></span>
                                <button id="add-modal-button" type="button" class="btn btn-primary" <?php echo esc_attr( $inputStatus ) ?>>Add Room</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        
                </div>
        </div>