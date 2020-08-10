<?php
$roomPrice = bshb_get_room_price($post->ID , $data->check_in , $data->check_out , $data->price_filter);
?>

<div class="room-price">                                                
<h1><?php echo esc_html($roomPrice['total']); ?></h1>
<p class="font-italic"><?php echo esc_html($roomPrice['nights']); ?></p>
</div> 