     
     <div class="bshb" id="bshb-room-field" data-post-id = "<?php echo esc_attr( $post_id ) ?>" >
        <div class="container-fluid">   
      <div class="row" id="sortable-container">
                        <?php foreach($roomUnits as $room) { ?>
                        <div class="col-sm-4 draggable" id="unit-<?php echo esc_attr( $room->id ); ?>" data-id="<?php echo esc_attr( $room->id ); ?>">
                                <div class="room-sortable">
                                        <div class="room-sortable-header" data-room-unit-id="<?php echo esc_attr( $room->id ); ?>">
                                                <!-- The Grip to drag Room Units -->
                                                <span class="sortable-grip">
                                                        <i class="fad fa-grip-horizontal  fa-2x icon-dark" title="Drag to Reorder"></i>
                                                </span>
                                                <!-- Delete room Unit button -->
                                                <span class="delete-room-unit" >
                                                        <i class=" fad fa-times icon-dark float-right  m-1 hover-warning" title="Delete Room"></i>
                                                </span>
                                                <!-- Edit Room unit button -->
                                                <span class="edit-room-unit">
                                                        <i id="edit-room-unit" class="fad fa-edit icon-dark float-right  m-1 hover-warning" title="Edit Room"></i>
                                                </span>
                                        </div>
                                        
                                        
                                        <!-- Room Unit Name -->
                                       <h5><?php echo esc_html( $room->name ); ?></h5>
                                        
                                </div>
                        </div>                        
                        <?php } ?>


  <div class="col-sm-4" id="action" data-id="<?php echo esc_attr( $room->id ); ?>">
                                <div class="room-add d-flex">                                       
                                        <!-- Room Unit Name -->
                                           <i id="add-room-unit" class="fad fa-4x fa-plus icon-dark float-right  m-auto hover-warning" title="Add Room"></i>
                                </div>
                        </div>




                </div>
        </div> <!-- End Container -->





<!-- Rename Room Modal -->
<div id="edit-room-modal" class="modal  mt-5" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Edit Name</h5>                                
                        </div>
                        
                        <div class="modal-body">
                              <div class="col-sm-12 my-2">
                                        <div class="input-group">                                                
                                                <input id="edit-name-input" name="edit-name" type="text" placeholder="Enter room name." class="form-control" maxlength = "25" required="true">                                      
                                        </div>                                          
                                </div>
                        </div>
                        <div class="modal-footer">
                                <button id="save-room-name" type="submit" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        
                </div>
        </div>
</div>

<!-- Confirm Delete Modal -->

<div id="delete-room-modal" class="modal mt-5" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Are you sure you want to delete room?</h5>                                
                        </div>
                        <div class="modal-footer">
                                <button id="delete-room" type="button" class="btn btn-primary">Delete Room</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        
                </div>
        </div>
</div>


<div id="add-room-modal" class="modal  mt-5" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Add a new room</h5>                                
                        </div>
                        
                        <div class="modal-body">
                              <div class="col-sm-12 my-2">     
                              
                              <!-- TODO -->
                              <!-- If max rooms then display cant add anymore -->
                              <?php if($roomsPresent < $maxRooms) { 
                                      $inputStatus = "required"; ?>
                              
                                        <div class="input-group">                                                
                                                <input id="room-name-modal-input" type="text" placeholder="Enter room name." class="form-control" maxlength = "25" required="true">                                      
                                        </div>
                              <?php } else {  $inputStatus= "disabled"; ?>

                                
                                <p>This room type has reached maximum number of rooms it can have.</p>
                                <small>Change the limit in settings.</small>
                              <?php } ?>
                                </div>
                        </div>
                        <div class="modal-footer">
                                <button id="add-modal-button" type="submit" class="btn btn-primary" <?php echo esc_attr( $inputStatus ) ?>>Add Room</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        
                </div>
        </div>
</div>






        </div>
        </div>