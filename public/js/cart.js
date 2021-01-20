(function ($) {

        'use strict';

        $(document).ready(function () {

                /**Add to cart
                 * 
                 * @param {int} itemId 
                 * @param {string} itemType 
                 * @param {int} itemQuantity 
                 */
                function addToCart(itemId, itemType, itemQuantity) {
                        $('#bshb-sidebar-cart').addClass('bshb-loader');
                        $.post(
                                ajaxurl,
                                {
                                        action: 'addToCart',
                                        itemId: itemId,
                                        itemType: itemType,
                                        itemQuantity: itemQuantity
                                },
                                function (response) {
                                        _loadSidebar(response);
                                },
                        );
                }

                /**Remove from cart
                 * 
                 * @param {int} itemId 
                 * @param {string} itemType 
                 */
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
                                        _loadSidebar(response);

                                },
                        );
                }

                /**Apply coupon code
                 * 
                 * @param {string} couponCode 
                 */
                function applyCouponCode(couponCode) {
                        // $('#bshb-sidebar-cart').addClass('bshb-loader');
                        $.post(
                                ajaxurl,
                                {
                                        action: 'applyCouponCode',
                                        couponCode: couponCode,
                                },
                                function (response) {
                                        if (response == false) {
                                                $('#coupon-message').html("Invalid Coupon");
                                                $('#coupon-message').removeClass('text-success');
                                                $('#coupon-message').addClass('text-danger');
                                                $('.coupon-status').removeClass('d-none');
                                        }
                                        else {
                                                $('#coupon-message').html(response);
                                                $('#coupon-message').removeClass('text-danger');
                                                $('#coupon-message').addClass('text-success');
                                                $('.coupon-status').removeClass('d-none');
                                                _loadPayment();
                                        }
                                },
                        );
                }

                /**
                 * Remove coupon code
                 */
                function removeCouponCode() {
                        $.post(
                                ajaxurl,
                                {
                                        action: 'removeCouponCode',
                                },
                                function (response) {
                                        $('#input-coupon').val("");
                                        if (response == true) {
                                                _loadPayment();
                                        }
                                },
                        );
                }

                /**Manage room count text
                 * 
                 * @param {object} element add-to-cart button element
                 * @param {string} action 
                 */
                function _manageRoomCount(element, action) {
                        var roomCount = $(element).data('room-count');
                        var textelement = $(element).parent().find('.room-count-text');
                        if (action == 'add') {
                                roomCount = roomCount - 1;
                        }
                        else if (action == 'remove') {
                                roomCount = roomCount + 1;
                        }

                        $(element).data('room-count', roomCount);

                        if (roomCount < 1) {
                                textelement.html("No rooms available");
                                $(element).prop('disabled', true);
                        }
                        else if (roomCount == 1) {
                                textelement.html(roomCount + " room available");
                                $(element).prop('disabled', false);
                        }
                        else {
                                textelement.html(roomCount + " rooms available");
                                $(element).prop('disabled', false);
                        }
                }

                /**Load sidebar template
                 * 
                 * @param {html} data json template file.
                 */
                function _loadSidebar(data = null) {
                        $('html, body').animate({
                                scrollTop: $("#bshb-sidebar-cart").offset().top
                        }, 100);

                        if (data) {
                                $('#bshb-sidebar-cart').html(data);
                                $('#bshb-sidebar-cart').removeClass('bshb-loader');
                        }
                        else {
                                $("#bshb-sidebar-cart").load(" #bshb-sidebar-cart > *", function () {
                                        $("#bshb-sidebar-cart").removeClass('bshb-loader');
                                });
                        }
                }

                /**
                 * Reload reserve booking template
                 */
                function _loadPayment() {
                        // Load cart totals
                        $("#cart-total").addClass('bshb-loader');
                        $("#cart-total").load(" #cart-total > *", function () {
                                $("#cart-total").removeClass('bshb-loader');
                        });

                        // Load final booking payment values
                        $("#bshb-payment-total").addClass('bshb-loader');
                        $("#bshb-payment-total").load(" #bshb-payment-total > *", function () {
                                $("#bshb-payment-total").removeClass('bshb-loader');
                        });
                }

                // Click events

                /**
                 * Room add button
                 */
                $('body').on('click', '.room-add-btn', function (event) {
                        var itemId = $(event.target).data('item-id');
                        var itemType = 'room_item';
                        var itemQuantity = 1;

                        addToCart(itemId, itemType, itemQuantity);
                        _manageRoomCount(this, 'add');

                });

                /**
                 * Remove room from cart button
                 */
                $('body').on('click', '#remove-room-item', function () {
                        var itemId = $(this).attr('data-item-id');
                        var itemType = 'room_item';
                        var roomTextElement = $(".room-add-btn[data-item-id='" + itemId + "']");

                        removeFromCart(itemId, itemType);
                        _manageRoomCount(roomTextElement, "remove");

                });

                /**
                 * Services add button
                 */
                $('.service-add-btn').click(function () {
                        var itemId = $(this).data('item-id');
                        var itemType = 'service_item';
                        var itemQuantity = $(this).parent().find('#item-quantity').val();

                        addToCart(itemId, itemType, itemQuantity);
                });

                /**
                 * Apply Coupon button
                 */
                $('body').on('click', '#apply-coupon', function () {
                        var couponCode = $('#input-coupon').val();
                        if (couponCode == "") {
                                $('#coupon-message').html("Please enter a coupon code");
                                $('#coupon-message').removeClass('text-success');
                                $('#coupon-message').addClass('text-danger');
                                $('.coupon-status').removeClass('d-none');
                        }
                        else {
                                applyCouponCode(couponCode);
                        }
                });

                /**
                 * Remove coupon button
                 */
                $('body').on('click', '#remove-coupon', function () {
                        removeCouponCode();
                        $('.coupon-status').addClass('d-none');
                });
        });
})(window.jQuery);
