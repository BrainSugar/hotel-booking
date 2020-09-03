(function ($) {

        'use strict';

        $(document).ready(function () {
                // Pricing functions
                // Add to cart functions
                $('body').on('click', '.room-add-btn', function (e) {
                        var itemId = $(this).data('item-id');
                        var roomCount = $(this).attr('data-room-count');
                        var itemType = 'room_item';

                        var roomCountText = $(this).parent().find('.room-count-text');
                        if (roomCount == 0) {
                                $(this).prop('disabled', true);
                                roomCountText.html("Fully Booked");
                                // roomCountText.css('color', 'red');
                        }
                        else {
                                roomCount = roomCount - 1;
                                roomCountText.html("Only " + roomCount + " rooms left");
                                $(this).attr('data-room-count', roomCount);
                                addToCart(itemId, itemType)
                        }


                });

                function addToCart(itemId, itemType) {
                        $('#bshb-sidebar-cart').addClass('bshb-loader');
                        $.post(
                                ajaxurl,
                                {
                                        action: 'addToCart',
                                        itemId: itemId,
                                        itemType: itemType
                                },
                                function (response) {
                                        alert(response);
                                        console.log(response);
                                        $('#bshb-sidebar-cart').find('.cart-empty').addClass('d-none');
                                        $('#bshb-sidebar-cart').append(response);
                                        $('#bshb-sidebar-cart').removeClass('bshb-loader');

                                },
                        );
                }
        });




})(window.jQuery);