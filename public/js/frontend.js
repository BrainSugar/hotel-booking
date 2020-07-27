(function ($) {

        'use strict';

        $(document).ready(function () {

                // alert('frontend');
                var today = moment().format('YYYY-MM-DD');
                // var tomorrow = moment().add(1, 'days').format('YYYY-MM-DD');
                // var defaultDates = [today, tomorrow];
                // alert(defaultDates);

                // var today = moment().format('D M Y');
                var dates = flatpickr("#input-check-in", {
                        "plugins": [new rangePlugin({ input: "#input-check-out" })],
                        "minDate": today,
                        altInput: true,
                        altFormat: "F j, Y",
                        dateFormat: "Y-m-d",
                        static: "true",
                        monthSelectorType: "static",
                });

                // Add Brainsugar Styles to flatpickr 
                dates.calendarContainer.classList.add("bshb-datepicker");



                $('body').on('submit', '#bshb-search-form', function (e) {
                        e.preventDefault();
                        var checkInDate = dates.selectedDates[0];
                        var checkOutDate = dates.selectedDates[1];
                        var adults = $('#input-adults').val();
                        var children = $('#input-children').val();
                        if (checkInDate == null) {
                                $('.input-check-in').addClass('validate-fail');
                                $('.input-check-out').addClass('validate-fail');
                                $('.validate-msg').removeClass('d-none');
                                return;
                        }
                        else {
                                $('.input-check-in').removeClass('validate-fail');
                                $('.input-check-out').removeClass('validate-fail');
                                $('.validate-msg').addClass('d-none');

                        }
                        if (adults == 0) {
                                $('#input-adults').val('1');

                        }
                        console.log(dates.selectedDates[0]);
                        $('#bshb-sidebar-dates').addClass('bshb-loader');
                        $('#bshb-search-content').addClass('bshb-loader');

                        $.post(
                                ajaxurl,
                                {
                                        action: 'searchAvailability',
                                        checkInDate: moment(checkInDate).format('YYYY-MM-DD'),
                                        checkOutDate: moment(checkOutDate).format('YYYY-MM-DD'),
                                        adults: adults,
                                        children: children,
                                },
                                function (response) {
                                        alert(response.searchResults);
                                        console.log(response.searchResults);
                                        $('#bshb-sidebar-dates').html(response.sidebarDates);
                                        $('#bshb-search-content').html(response.searchResults);
                                        $('#bshb-sidebar-dates').removeClass('bshb-loader');
                                        $('#bshb-search-content').removeClass('bshb-loader');
                                },
                        );

                });


                console.log(dates);
        });

})(window.jQuery);