<h1>I am the rooms</h1>
<?php 
global $wp_query;




$args = array(
        'post_type' => 'bshb_room',
        'post__in' => $data['rooms'],
       
);

$posts = get_posts($args);
var_dump($posts);

?>
<!-- Maya Room Cards -->
<div class="col-sm-12 mb-5">
        <article class="article-room hover-shadow-1">
                <header>
                
                </header>
                <!-- Call partial result/room-type.php -->
                <!-- Gets the image and the room features. -->
             
                <footer>
                        <!-- Call Partial result/header.php -->
                        
                        <div class="row px-2 mt-3">
                                <div class="col-sm-12 col-md-5 col-lg-5 d-flex align-items-center">
                                        <h1 class="display-3 room-price">57$</h1>
                                        <p class="cost-night align-self-center p-2">cost for 1 night</p>
                                        
                                </div>
                                <div class="col-sm-12 col-md-7 col-lg7 text-center">
                                     
                                </div>
                        </div>
                </footer>
        </article>
</div>