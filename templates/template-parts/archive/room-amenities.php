<!-- Amenities Block -->
        <div class="amenity-slider swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                        <!-- Slides -->
                                        <div class="swiper-slide">
                                                <div class="amenity">
                                                        <i class="fad fa-2x fa-shower mb-2"></i>
                                                        <span>Shower</span>
                                                </div>
                                        </div>

                           
                                        <div class="swiper-slide">
                                                <div class="amenity">
                                                        <i class="fad fa-2x fa-bath mb-2"></i>
                                                        <span>Bath</span>
                                                </div>
                                        </div>
                              
                                        <div class="swiper-slide">
                                                <div class="amenity">
                                                        <i class="fad fa-2x fa-tv mb-2"></i>
                                                        <span>Television</span>
                                                </div>
                                        </div>

                                          <div class="swiper-slide">
                                                <div class="amenity">
                                                        <i class="fad fa-2x fa-wifi mb-2"></i>
                                                        <span>Wi - Fi</span>
                                                </div>
                                        </div>

                           
                                        <div class="swiper-slide">
                                                <div class="amenity">
                                                        <i class="fad fa-2x fa-swimming-pool mb-2"></i>
                                                        <span>Swimming Pool</span>
                                                </div>
                                        </div>

                                        <div class="swiper-slide">
                                                <div class="amenity">
                                                        <i class="fad fa-2x fa-bed-alt mb-2"></i>
                                                        <span>King Size</span>
                                                </div>
                                        </div>

                           
                                        
                              
                                        <div class="swiper-slide">
                                                <div class="amenity">
                                                        <i class="fad fa-2x fa-bed-bunk mb-2"></i>
                                                        <span>4 Extra Beds</span>
                                                </div>
                                        </div>
                               
                        </div>

                <!-- If we need navigation buttons -->
                <div class="button-prev">
                        <i class="fad fa-2x fa-angle-left"></i>
                </div>
                <div class="button-next">
                        <i class="fad fa-2x fa-angle-right"></i>
                </div>
   
</div>


<!-- Script to Initialize all the instances of swiper slider. -->
<script>
        (function ($) {
                'use strict';
              
        $(document).ready(function () {
                    var mySwiper = new Swiper('.swiper-container', {
                        // Optional parameters
                        direction: 'horizontal', 
                        slidesPerView: 4,
                        // slidesPerColumn:1,                        
                        // slidesPerColumnFill: 'row',
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

                        // And if we need scrollbar
                        // scrollbar: {
                        //         el: '.swiper-scrollbar',
                        // },
                })
                console.log(mySwiper);
        });
        })(jQuery)
</script>