<?php 
global $wp_query;




$args = array(
        'post_type' => 'bshb_room',
        'post__in' => $data['rooms'],
       
);

$posts = get_posts($args);

var_dump($data);
?>
<!-- Maya Room Cards -->
<div class="row">
<?php foreach($posts as $post) :  setup_postdata($post);  ?> 

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
                                 <h1 class="room-title"><?php the_title(); ?></h1>
                        </div>
                        <div class="col-sm-6">
                                <div class="room-price">
                                        <h1><?php echo bshb_get_room_price($post->ID);?></h1>
                                        <p class="font-italic">/ 3 Nights</p>
                                </div>
                                                                
                        </div>
                        </div>
               
                <p></p>
                </div>
                
               
                <footer>
                          
                       
                </footer>
        </article>
</div>
<?php endforeach; ?>
</div>