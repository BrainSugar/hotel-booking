(function ($) {

        'use strict';

        $(document).ready(function () {

                alert('frontend');
                var today = moment();
                var dates = flatpickr("#check-in", {
                        "plugins": [new rangePlugin({ input: "#check-out" })]
                });
                console.log(dates.selectedDates[1]);

                $('body').on('click', '#search-submit', function () {
                        var checkIn = $('#check-in').val();
                        var checkOut = $('#check-out').val();

                        $.post(
                                ajaxurl,
                                {
                                        action: 'trusted',
                                        checkIn: checkIn,
                                        checkOut: checkOut
                                },
                                function (response) {
                                        alert(response);
                                        // $('#bshb-search-content').html(response);
                                }
                        );

                });


                console.log(dates);
        });

})(window.jQuery);