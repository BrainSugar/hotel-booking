<?php 
global $wp_query;
$_SESSION['myKey'] = "Some data I need later";

if(isset($_SESSION['myKey'])) {
    $value = $_SESSION['myKey'];
} else {
    $value = '';
}

echo $value;


?>
<!-- Maya Room Cards -->
<div class="row">
<?php foreach($data->posts as $post) :  setup_postdata($post);  ?> 
<div class="col-sm-6">
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
                                <div class="col-sm-12">                                                       
                                        <h1 class="room-title"><?php the_title(); ?></h1>                                       
                                </div> 
                        <!-- Room Info -->
                                <div class="col-sm-12">                                         
                                        <?php bshb_get_template_part('template-parts/archive/room' , 'info') ?> 
                                </div>
                        </div>                        
                        <!-- Room Price and book button -->
                        <div class="row">
                                <div class="col-sm-12">
                                     <?php bshb_get_template_part('template-parts/archive/room' , 'price') ?> 
                                </div>
                                <div class="col-sm-12">
                                        <?php bshb_get_template_part('template-parts/archive/room' , 'add-to-cart') ?> 
                                </div>
                        </div>
                </div>
        </article>
</div>
<?php endforeach; ?>
</div>

