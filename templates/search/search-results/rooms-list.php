<?php 

// $numberofrooms = $data->room_data[645];
// var_dump(count($data->posts));
?>
<!-- Maya Room Cards -->
<div class="row">
<?php foreach($data->posts as $post) :  setup_postdata($post);  ?> 
<div class="col-sm-12">
        <!-- Room Container -->
        <article class="room-list-wrapper">
        <!-- Wrapper for the room image and amenities slider -->
                <div class="room-display">
                        <div class="room-image">
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url( $post->ID , 'full')); ?>" />
                        </div>

                        <div class="room-amenities">
                                <?php bshb_get_template_part('template-parts/archive/room' , 'amenities') ?>                 
                        </div>
                </div>
        <!-- Wrapper for title , price and book button -->
                <div class="room-content">
                        <div class="row">
                        <!-- The Room Title -->    
                                <div class="col-sm-12 col-xs-12 col-md-6">                                                       
                                        <h1 class="room-title"><?php the_title(); ?></h1>                                       
                                </div> 
                        <!-- Room Info -->
                                <div class="col-sm-12 col-xs-12 col-md-6">                                         
                                        <?php bshb_get_template_part('template-parts/archive/room' , 'info') ?> 
                                </div>
                        </div>
                        <!-- Room Description -->
                        <div class="row">
                                <div class="col-sm-12">
                                          <div class="room-desc">
                                                <?php the_excerpt(); ?>
                                        </div>
                                </div>
                        </div>
                        <!-- Room Price and book button -->
                        <div class="row">
                                <div class="col-sm-6">
                                        <div class="room-price">                                                
                                                <h1><?php var_dump( bshb_get_room_price($post->ID , $data->check_in , $data->check_out));?></h1>
                                                <p class="font-italic">/ 3 Nights</p>
                                        </div> 
                                </div>
                                <div class="col-sm-6">
                                        <div class="room-add-cart d-flex">
                                                <p><?php echo 'Only ' .  count($data->room_data[$post->ID]) . ' rooms left';?></p>
                                                <button class="btn btn-success">Add to cart</button>                                        
                                        </div>
                                </div>
                        </div>
                </div>
        </article>
</div>
<?php endforeach; ?>
</div>

