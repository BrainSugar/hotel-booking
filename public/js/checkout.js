(function ($) {

        'use strict';

        $(document).ready(function () {
                $('body').on('click', '#bshb-reserve-booking', function (e) {
                        // if (guestInputValidate() == true && paymentInputValidate() == true) {
                        var guestDetails = $("#bshb-guest-form").serialize();
                        var paymentMethod = $('#payment_gateways').serialize();
                        createReservation(guestDetails, paymentMethod);
                        // }

                });

                function paymentInputValidate() {
                        $('#payment_gateways').validate({
                                rules: {
                                        payment_option: "required"
                                },
                                messages: {
                                        payment_option: "Please select a payment method"
                                },
                                errorElement: 'span',
                                errorLabelContainer: '.payment-error'
                        });
                        if ($('#payment_gateways').valid()) {
                                return true;
                        }

                }
                function guestInputValidate() {
                        $("#bshb-guest-form").validate({
                                rules: {
                                        guest_first_name: "required",
                                        guest_last_name: "required",
                                        guest_email: "required",
                                        guest_phone: "required",
                                        guest_address_1: "required",
                                        guest_city: "required",
                                        guest_country: "required",
                                        guest_postcode: "required"
                                },
                                messages: {
                                        guest_first_name: {
                                                required: "Please enter your first name"
                                        },
                                        guest_last_name: {
                                                required: "Please enter your last name"
                                        }
                                },
                        });
                        if ($("#bshb-guest-form").valid()) {
                                return true;
                        }
                }

                function createReservation(guestDetails, paymentMethod) {
                        $.post(
                                ajaxurl,
                                {
                                        action: 'captureReservation',
                                        guestDetails: guestDetails,
                                        paymentMethod: paymentMethod
                                },
                                function (response) {
                                        // window.location.href = response.href;
                                        console.log(response);

                                },
                        );
                }
        });

})(window.jQuery);
