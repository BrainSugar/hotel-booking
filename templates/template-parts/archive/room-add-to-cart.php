<?php  
$room_count =  $data->roomsLeft[$post->ID];
?>
<div class="room-add-cart d-flex">
       <p class="room-count-text"><?php echo 'Only ' . $room_count . ' rooms left';?></p>
       <button class="btn btn-success room-add-btn" data-item-id = "<?php echo $post->ID; ?>" data-room-count="<?php echo $room_count; ?>">Add to cart</button>                                        
</div>