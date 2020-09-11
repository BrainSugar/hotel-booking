(function ($) {

        'use strict';

        $(document).ready(function () {

                // Check if items are available in cart and load the cart.
                // checkCartSession();
                // function checkCartSession() {
                //         $.post(
                //                 ajaxurl,
                //                 {
                //                         action: 'cartSession',
                //                 },
                //                 function (response) {
                //                         alert(response);
                //                         console.log(response);
                //                         if (response != null) {
                //                                 $('#bshb-sidebar-cart').find('.cart-empty').addClass('d-none');
                //                                 $('#bshb-sidebar-cart').html(response);
                //                                 $('#bshb-sidebar-cart').removeClass('bshb-loader');
                //                         }

                //                 },
                //         );
                // }


                $('body').on('click', '.room-add-btn', function (e) {
                        var itemId = $(this).data('item-id');
                        var roomCount = $(this).attr('data-room-count');
                        var itemType = 'room_item';

                        var roomCountText = $(this).parent().find('.room-count-text');
                        if (roomCount == 1) {
                                $(this).prop('disabled', true);
                                roomCountText.html("Fully Booked");
                        }
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
                                        // alert(response);
                                        // console.log(response);
                                        $('html, body').animate({
                                                scrollTop: $("#bshb-sidebar-cart").offset().top
                                        }, 100);
                                        $('#bshb-sidebar-cart').find('.cart-empty').addClass('d-none');
                                        $('#bshb-sidebar-cart').html(response);
                                        $('#bshb-sidebar-cart').removeClass('bshb-loader');

                                },
                        );
                        return true;
                }

                function removeFromCart(itemId, itemType) {
                        $('#bshb-sidebar-cart').addClass('bshb-loader');
                        $.post(
                                ajaxurl,
                                {
                                        action: 'removeFromCart',
                                        itemId: itemId,
                                        itemType: itemType
                                },
                                function (response) {
                                        // alert(response);
                                        // $('#bshb-sidebar-cart').scrollTop(300);
                                        $('html, body').animate({
                                                scrollTop: $("#bshb-sidebar-cart").offset().top
                                        }, 100);
                                        $('#bshb-sidebar-cart').find('.cart-empty').addClass('d-none');
                                        $('#bshb-sidebar-cart').html(response);
                                        $('#bshb-sidebar-cart').removeClass('bshb-loader');
                                },
                        );
                        return true;

                }

                $('body').on('click', '#remove-room-item', function (e) {
                        var itemId = $(this).attr('data-item-id');
                        var itemType = 'room_item';
                        var response = removeFromCart(itemId, itemType);
                        // alert(response);
                });



        });

})(window.jQuery);
