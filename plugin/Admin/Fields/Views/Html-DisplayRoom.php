     
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
                                       <h5><?php echo esc_html( $room->room_name ); ?></h5>
                                        
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

       <?php echo Brainsugar()->view('Admin.Popups.room-update')->with('nameInput' , $editRoomName); ?>
</div>

<!-- Confirm Delete Modal -->

<div id="delete-room-modal" class="modal mt-5" tabindex="-1" role="dialog">
     <?php echo Brainsugar()->view('Admin.Popups.room-delete'); ?>
</div>


<div id="add-room-modal" class="modal  mt-5" tabindex="-1" role="dialog">
<?php echo Brainsugar()->view('Admin.Popups.room-add')
->with('roomUnits' , $roomUnits)
->with('maxRooms' , $maxRooms); ?>
     
</div>






        </div>
        </div>