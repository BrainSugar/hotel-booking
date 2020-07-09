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