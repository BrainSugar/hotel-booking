(function ($) {

        'use strict';

        $(document).ready(function () {

                // alert('frontend');
                var today = moment().format('YYYY-MM-DD');
                // var tomorrow = moment().add(1, 'days').format('YYYY-MM-DD');
                // var defaultDates = [today, tomorrow];
                // alert(defaultDates);

                // var today = moment().format('D M Y');
                var dates = flatpickr("#check-in-input", {
                        "plugins": [new rangePlugin({ input: "#check-out-input" })],
                        "minDate": today,
                        altInput: true,
                        altFormat: "F j, Y",
                        dateFormat: "Y-m-d",
                        static: "true",
                        monthSelectorType: "static",
                });

                // Add Brainsugar Styles to flatpickr 
                dates.calendarContainer.classList.add("bshb-datepicker");

                console.log(dates.calendarContainer);

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