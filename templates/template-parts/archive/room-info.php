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