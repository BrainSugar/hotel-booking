(function ($) {

        'use strict';

        $(document).ready(function () {

                var today = moment().format('YYYY-MM-DD');
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

                // Check if a previous search session is active and load the active session data.
                // checkSearchSession();
                // function checkSearchSession() {
                //         $.post(
                //                 ajaxurl,
                //                 {
                //                         action: 'searchSession',
                //                 },
                //                 function (response) {
                //                         // alert(response);
                //                         // console.log(dates);
                //                         if (response != null) {
                //                                 // Set up all variables with session values and perform search again.
                //                                 var sessionDates = [response.check_in, response.check_out];
                //                                 dates.setDate(sessionDates, true);
                //                                 $('#input-adults').val(response.adults);
                //                                 $('#input-children').val(response.children);
                //                                 performSearch();
                //                         }

                //                 },
                //         );
                // }


                // Function to perform search
                function performSearch(filterView, filterPrice) {
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
                                        filterView: filterView,
                                        filterPrice: filterPrice

                                },
                                function (response) {
                                        // alert(response);
                                        // console.log(response);                                        
                                        $('#bshb-sidebar-dates').html(response.sidebarDates);
                                        $('#bshb-search-content').html(response.searchResults);
                                        $('#bshb-sidebar-dates').removeClass('bshb-loader');
                                        $('#bshb-search-content').removeClass('bshb-loader');
                                        $('html, body').animate({
                                                scrollTop: $("#bshb-search-content").offset().top
                                        }, 100);
                                },
                        );

                }


                // Filter and search actions
                var filterPrice;
                var filterView;

                $('body').on('submit', '#bshb-search-form', function (e) {
                        e.preventDefault();
                        filterPrice = "total";
                        filterView = "list";
                        performSearch(filterView, filterPrice);
                });

                $('body').on('click', '#filter-grid', function (e) {
                        e.preventDefault();
                        filterView = "grid";
                        performSearch(filterView, filterPrice);

                });
                $('body').on('click', '#filter-list', function (e) {
                        e.preventDefault();
                        filterView = "list";
                        performSearch(filterView, filterPrice);
                });
                $('#price-total').click(function () {
                        filterPrice = 'total';
                        performSearch(filterView, filterPrice);
                });
                $('#price-night').click(function () {
                        filterPrice = 'perNight';
                        performSearch(filterView, filterPrice);
                });

                console.log(dates);

        });
})(window.jQuery);