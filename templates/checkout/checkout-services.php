<?php 
$services =  bshb_get_services();               
?>
<div class="services-container">
        <h1 class="display-4 mb-4"> Services</h1>
        <p>Add these services to complement your stay.</p>

        <!-- Services Block -->
        <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php foreach($services as $post) :  setup_postdata($post);  ?>
                        <div class="swiper-slide">
                                <?php bshb_get_template_part('template-parts/archive/service-item'); ?>
                        </div>
                        <?php endforeach; ?>
                </div>

                <!-- If we need navigation buttons -->
                <div class="button-prev">
                        <i class="fad fa-2x fa-angle-left"></i>
                </div>
                <div class="button-next">
                        <i class="fad fa-2x fa-angle-right"></i>
                </div>
        </div>


</div>






<!-- Script to Initialize all the instances of swiper slider. -->
<script>
        (function ($) {
                'use strict';

                $(document).ready(function () {

                        var servicesSwiper = new Swiper('.swiper-container', {
                                // Optional parameters
                                direction: 'horizontal',
                                slidesPerView: 3,
                                slidesPerColumn: 1,
                                slidesPerColumnFill: 'row',
                                spaceBetween: 20,
                                centerInsufficientSlides: true,



                                // If we need pagination
                                // pagination: {
                                //         el: '.swiper-pagination',
                                // },

                                // Navigation arrows
                                navigation: {
                                        nextEl: '.button-next',
                                        prevEl: '.button-prev',
                                },
                                breakpoints: {
                                        0: {
                                                slidesPerView: 1,
                                                spaceBetween: 20,
                                        },
                                        768: {
                                                slidesPerView: 2,
                                                spaceBetween: 10,
                                        },
                                        1024: {
                                                slidesPerView: 3,
                                                spaceBetween: 20,
                                        },
                                },

                                // And if we need scrollbar
                                // scrollbar: {
                                //         el: '.swiper-scrollbar',
                                // },
                        })
                });
        })(jQuery)
</script>



                
<!-- Script to  incremend and decrement the plus and minus buttons -->
<script>
        (function ($) {
                'use strict';
                $('body').on('click', '.minus', function () {
                        var input = $(this).parent().find('input');
                        var count = parseInt(input.val()) - 1;
                        count = count < 1 ? 0 : count;
                        input.val(count);
                        input.change();
                        return false;
                });
                $('body').on('click', '.plus', function () {
                        var input = $(this).parent().find('input');
                        var count = parseInt(input.val()) + 1;
                        var max = input.attr('max');
                        count = count > max ? max : count;
                        input.val(count);
                        input.change();
                        return false;
                });
        })(jQuery)
</script>