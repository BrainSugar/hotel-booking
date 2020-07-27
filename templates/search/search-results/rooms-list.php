<?php 
global $wp_query;

$numberofrooms = $data->room_data[645];
var_dump(count($numberofrooms));
?>
<!-- Maya Room Cards -->
<div class="row">
<?php foreach($data->posts as $post) :  setup_postdata($post);  ?> 

<div class="col-sm-12 mb-5">
<!-- Room Container -->
        <article class="room-item">
        <!-- Room Image -->
                <div class="room-image">
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url( $post->ID , 'full')); ?>" />
                </div>

        <!-- Room Title -->
                <div class="room-content">
                        <div class="row">
                        <div class="col-sm-6">
                        <!-- The Room Title -->
                                <h1 class="room-title"><?php the_title(); ?></h1>
                        <!-- The room Description -->
                                <P class="room-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat consectetur maxime officiis harum quasi, iste assumenda eius distinctio mollitia corporis id quidem libero. Sequi adipisci sed nesciunt. Doloremque, ipsum in!</P>
                        <!-- Price of the room -->
                                <div class="room-price">
                                        <h1><?php echo bshb_get_room_price($post->ID);?></h1>
                                        <p class="font-italic">/ 3 Nights</p>
                                </div>
                        </div>            
                        <div class="col-sm-6">
                                <!-- Container for info blocks -->
                                <div class="room-info">
                                <!-- Room size -->
                                        <div class="room-size">
                                                <i class="fad fa-ruler-combined"></i>
                                                <p> 150 (ft²)</p>
                                        </div>
                                <!-- Room Adults -->
                                        <div class="room-adults">
                                                <i class="fad fa-user"></i>
                                                <p>x <?php echo get_post_meta($post->ID , 'bshb_max_adults', true ); ?></p>                                                
                                        </div>
                                <!-- Room Children -->
                                        <div class="room-children">
                                                <i class="fad fa-child"></i>
                                                <p>x <?php echo get_post_meta($post->ID , 'bshb_max_children', true ); ?></p>
                                        </div>
                                </div>                                
                        </div>
                        <!-- Price of the room -->
                                <!-- <div class="room-price">
                                        <h1><?php echo bshb_get_room_price($post->ID);?></h1>
                                        <p class="font-italic">/ 3 Nights</p>
                                </div> -->
                        <!-- Display the available rooms -->
                                <!-- <div class="available-rooms">
                                        <p><?php echo 'Only ' .  count($data->room_data[$post->ID]) . ' rooms left';?></p>
                                </div> -->
                        <!-- Add to cart button -->
                                <div class="input-group-lg p-4">
                                        <button class="btn btn-success float-right w-100">Add to cart</button>
                                </div>
                                                                
                        </div>
                        </div>
               
                <p></p>
                </div>               
                <!-- <footer>
                          
                           -->
                       
                </footer>
        </article>
</div>
<?php endforeach; ?>
</div>