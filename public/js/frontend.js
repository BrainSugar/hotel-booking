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

                function performSearch(filterView) {
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
                                        view: filterView,
                                },
                                function (response) {
                                        // alert(response.searchResults);
                                        // console.log(response.searchResults);
                                        $('#bshb-sidebar-dates').html(response.sidebarDates);
                                        $('#bshb-search-content').html(response.searchResults);
                                        $('#bshb-sidebar-dates').removeClass('bshb-loader');
                                        $('#bshb-search-content').removeClass('bshb-loader');
                                },
                        );

                }



                $('body').on('submit', '#bshb-search-form', function (e) {
                        e.preventDefault();
                        performSearch('list');
                });
                $('body').on('click', '#filter-grid', function (e) {
                        e.preventDefault();
                        performSearch('grid');
                });
                $('body').on('click', '#filter-list', function (e) {
                        e.preventDefault();
                        performSearch('list');
                });

                console.log(dates);
        });

})(window.jQuery);