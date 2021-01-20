(function ($) {

        'use strict';

        $(document).ready(function () {

                // Initialize Flatpicker
                var today = moment().format('YYYY-MM-DD');
                var dates = flatpickr("#input-check-in",
                        {
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


                /**
                 * Perform Search
                 * 
                 * Call Ajax Search availability with sortting preferences , 
                 * get search results template and load in the HTML container
                 * 
                 * @param string filterView 
                 * @param string filterPrice 
                 * @param string sortPrice 
                 */
                function performSearch(filterView, filterPrice, sortPrice) {

                        var checkInDate = dates.selectedDates[0];
                        var checkOutDate = dates.selectedDates[1];
                        var adults = $('#input-adults').val();
                        var children = $('#input-children').val();

                        // Validate Dates
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

                        // Set minimum for search.
                        if (adults == 0) {
                                $('#input-adults').val('1');
                        }

                        // Add Loaders
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
                                        filterPrice: filterPrice,
                                        sortPrice: sortPrice

                                },
                                function (response) {
                                        // scroll top
                                        $('html, body').animate({
                                                scrollTop: $("#bshb-search-content").offset().top
                                        }, 100);

                                        // Load Content
                                        $('#bshb-sidebar-dates').html(response.sidebarDates);
                                        $('#bshb-search-content').html(response.searchResults);
                                        // remove loaders
                                        $('#bshb-sidebar-dates').removeClass('bshb-loader');
                                        $('#bshb-search-content').removeClass('bshb-loader');
                                },
                        );

                }

                /**
                 * 
                 * Filter and search actions
                 * 
                 */

                var filterPrice;
                var filterView;
                var sortPrice;


                //   On search submit
                $('body').on('submit', '#bshb-search-form', function (e) {
                        e.preventDefault();
                        filterPrice = "total";
                        filterView = "list";
                        sortPrice = "ASC";
                        performSearch(filterView, filterPrice, sortPrice);
                });

                // Filter : Grid
                $('body').on('click', '#filter-grid', function (e) {
                        e.preventDefault();
                        filterView = "grid";
                        performSearch(filterView, filterPrice, sortPrice);
                });

                // Filter : List
                $('body').on('click', '#filter-list', function (e) {
                        e.preventDefault();
                        filterView = "list";
                        performSearch(filterView, filterPrice, sortPrice);
                });

                // Price filter : Total
                $('#price-total').click(function () {
                        filterPrice = 'total';
                        performSearch(filterView, filterPrice, sortPrice);
                });

                // Price filter : Price / Night
                $('#price-night').click(function () {
                        filterPrice = 'perNight';
                        performSearch(filterView, filterPrice, sortPrice);
                });

                // Sort : Lowest price first
                $('#sort-asc').click(function () {
                        sortPrice = 'asc';
                        performSearch(filterView, filterPrice, sortPrice);
                        // performSearch(filterView, filterPrice);
                });

                // Sort : Highest price first
                $('#sort-desc').click(function () {
                        sortPrice = 'desc';
                        performSearch(filterView, filterPrice, sortPrice);
                });
        });
})(window.jQuery);