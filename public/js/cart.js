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
                $('.service-add-btn').click(function () {
                        var itemType = 'service_item';
                        var itemId = $(this).data('item-id');
                        var itemQuantity = $(this).parent().find('#item-quantity').val();
                        // alert(itemQuantity);
                        addToCart(itemId, itemType, itemQuantity);
                });

                $('body').on('click', '#apply-coupon', function () {
                        var couponCode = $('#input-coupon').val();
                        applyCouponCode(couponCode);
                });

                $('body').on('click', '#remove-coupon', function () {
                        removeCouponCode();
                        $('.coupon-status').addClass('d-none');
                });



                $('body').on('click', '.room-add-btn', function (e) {
                        var itemId = $(this).data('item-id');
                        var roomCount = $(this).attr('data-room-count');
                        var itemType = 'room_item';
                        var itemQuantity = 1;
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
                                addToCart(itemId, itemType, itemQuantity)
                        }


                });


                function addToCart(itemId, itemType, itemQuantity) {
                        if (itemType == "room_item") {
                                $('#bshb-sidebar-cart').addClass('bshb-loader');
                        }
                        else if (itemType == "service_item") {
                                $("#bshb-cart-summary").addClass('bshb-loader');
                        }
                        $.post(
                                ajaxurl,
                                {
                                        action: 'addToCart',
                                        itemId: itemId,
                                        itemType: itemType,
                                        itemQuantity: itemQuantity
                                },
                                function (response) {

                                        if (itemType == "room_item") {
                                                loadSidebar(response);
                                        }
                                        else if (itemType == "service_item") {
                                                loadCartSummary();
                                        }
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
                                        loadSidebar(response);

                                },
                        );
                        return true;
                }
                function loadSidebar(data) {
                        $('html, body').animate({
                                scrollTop: $("#bshb-sidebar-cart").offset().top
                        }, 100);
                        $('#bshb-sidebar-cart').find('.cart-empty').addClass('d-none');
                        $('#bshb-sidebar-cart').html(data);
                        $('#bshb-sidebar-cart').removeClass('bshb-loader');
                }
                function loadCartSummary() {
                        $('html, body').animate({
                                scrollTop: $("#bshb-cart-summary").offset().top
                        }, 100);

                        $("#bshb-cart-summary").load(" #bshb-cart-summary > *", function () {
                                $("#bshb-cart-summary").removeClass('bshb-loader');
                        });
                        loadPayment();

                }
                function loadCartTotal() {
                        $("#bshb-cart-final-total").addClass('bshb-loader');

                        $('html, body').animate({
                                scrollTop: $("#bshb-cart-final-total").offset().top
                        }, 100);
                        $("#bshb-cart-final-total").load(" #bshb-cart-final-total > *", function () {
                                $("#bshb-cart-final-total").removeClass('bshb-loader');
                        });
                        loadPayment();
                }
                function loadPayment() {
                        $("#bshb-payment-total").addClass('bshb-loader');
                        $("#bshb-payment-total").load(" #bshb-payment-total > *", function () {
                                $("#bshb-payment-total").removeClass('bshb-loader');
                        });

                }

                function applyCouponCode(couponCode) {
                        var couponMsg = "";
                        if (couponCode == "") {
                                couponMsg = "Please enter a coupon code";
                                $('#coupon-message').html(couponMsg);
                                $('#coupon-message').css('color', 'red');
                                return;
                        }
                        else {
                                $.post(
                                        ajaxurl,
                                        {
                                                action: 'applyCouponCode',
                                                couponCode: couponCode,
                                        },
                                        function (response) {
                                                if (response.coupon_status == true) {
                                                        $('#coupon-message').html(response.coupon_message);
                                                        $('#coupon-message').css('color', 'green');
                                                        loadCartTotal();
                                                }
                                                else {
                                                        $('#coupon-message').html(response.coupon_message);
                                                        $('#coupon-message').css('color', 'red');
                                                }
                                                $('.coupon-status').removeClass('d-none');
                                        },
                                );
                        }

                }

                function removeCouponCode() {
                        $.post(
                                ajaxurl,
                                {
                                        action: 'removeCouponCode',
                                },
                                function (response) {
                                        if (response) {
                                                $('#input-coupon').val("");
                                                loadCartTotal();
                                        }

                                },
                        );

                }

                $('body').on('click', '#remove-room-item', function (e) {
                        var itemId = $(this).attr('data-item-id');
                        var itemType = 'room_item';
                        var response = removeFromCart(itemId, itemType);
                        // alert(response);
                });



        });

})(window.jQuery);
