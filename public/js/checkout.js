(function ($) {

        'use strict';

        $(document).ready(function () {
                $('body').on('click', '#bshb-reserve-booking', function (e) {
                        guestInputValidate();

                });

                function guestInputValidate() {
                        $("#guest-information").validate({
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
                        if ($("#guest-information").valid()) {
                                alert("valid");
                        }
                        else {
                                alert("invalid");
                        }
                }
        });

})(window.jQuery);
