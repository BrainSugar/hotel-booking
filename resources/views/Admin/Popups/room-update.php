  <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title"><?php echo esc_html('Edit Name'); ?></h5>                                
                        </div>
                        
                     
                                <div class="modal-body">
                                <div class="col-sm-12 my-2">    
                                                              
                                                        <div class="input-group ">                                                                                                                     
                                                                <?php echo $nameInput; ?>                                             
                                                                <!-- <input id="input_room_name" type="text" placeholder="Enter room name." class="form-control" maxlength = "25">                                       -->
                                                        </div>                                         
                                        </div>
                                </div>
                                <div class="modal-footer">
                                        <span class="save-room-name-spinner spinner"></span>
                                        <submit id="save-room-name" type="submit" class="btn btn-primary"><?php echo esc_html('Save changes'); ?></submit>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo esc_html('Close'); ?></button>
                                        
                                </div>
                        
                        
                </div>
        </div>