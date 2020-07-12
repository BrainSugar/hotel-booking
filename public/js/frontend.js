(function ($) {

        'use strict';

        $(document).ready(function () {

                alert('frontend');

                // var today = moment().format('D M Y');
                var dates = flatpickr("#check-in", {
                        "plugins": [new rangePlugin({ input: "#check-out" })],
                        "minDate": "today",
                });
                console.log(dates.selectedDates[1]);

                $('body').on('submit', '#bshb-search-form', function (e) {
                        e.preventDefault();
                        var checkIn = $('#check-in').val();
                        var checkOut = $('#check-out').val();
                        var adults = $('#adults').val();
                        var children = $('#children').val();

                        $.post(
                                ajaxurl,
                                {
                                        action: 'availabilitySearch',
                                        checkIn: checkIn,
                                        checkOut: checkOut,
                                        adults: adults,
                                        children: children,
                                },
                                function (response) {
                                        // alert(response);
                                        $('#bshb-search-content').html(response);
                                }
                        );

                });


                console.log(dates);
        });

})(window.jQuery);