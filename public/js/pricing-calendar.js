(function ($) {

        'use strict';

        $(document).ready(function () {
                alert("pricing-calendar");
                var priceRange = roomData.price;
                console.log(priceRange);

                var post_template = wp.template('pricing-calendar');

                function addPlusSign(target) {
                        $(target).find('.add-icon').css({
                                visibility: 'visible',
                                opacity: '1'
                        });
                }

                var pricingCalendar = $('#pricing-calendar').clndr({
                        // events: bookings,
                        selectedDate: null,
                        trackSelectedData: true,
                        events: priceRange,
                        multiDayEvents: {
                                endDate: 'end_date',
                                startDate: 'start_date'
                        },

                        render: function (data) {
                                return post_template(data);
                        },
                        lengthOfTime: {
                                startDate: moment().subtract(2, 'days'),
                                days: 7,
                                interval: 7,
                        },
                        ready: function () {


                        },
                        doneRendering: function () {



                        },
                        clickEvents: {
                                click: function (target) {


                                        // Current instance of the calendar
                                        var calendar = this;

                                        // The Clicked date div
                                        var element = target.element;

                                        // The room ID of the currently clicked date.
                                        var roomId = $(element).data('room-id');

                                        // Add plus sign for the currently clicked date element.
                                        addPlusSign(element);

                                        // Set the background 
                                        $(element).css({
                                                background: '#e8f1f8'
                                        });



                                        // Check if its the First click or the second click.
                                        // The variable in Extras contain the click count.
                                        // if (click == 0) its the first click else the second click.
                                        // if its the first click continue
                                        if (calendar.options.extras.clicks == 0) {

                                                // set room Id in extras variables 
                                                calendar.options.extras.roomId = roomId;

                                                // Set the start of the price range
                                                calendar.options.extras.rangeStart = target.date;

                                                // Set the next click to be second click.
                                                calendar.options.extras.clicks++;

                                        }
                                        else {

                                                // set the second click range End
                                                calendar.options.extras.rangeEnd = target.date;

                                                // reset the number of clicks
                                                calendar.options.extras.clicks--;

                                                console.log(calendar.options.extras.rangeStart);

                                                // Check if the second click is on a date before the first date.  
                                                var prevDate = moment(target.date).isBefore(calendar.options.extras.rangeStart, 'day');

                                                // Check if the two clicks are for the same room ID.
                                                if (roomId == calendar.options.extras.roomId && prevDate == false) {

                                                        var modal = $('#show-pricing-modal');

                                                        // Populate Modal elements.
                                                        modal.find('.modal-title').html("Update Price");
                                                        modal.find('.range-start').text(calendar.options.extras.rangeStart.format('D-M-Y'));
                                                        modal.find('.range-end').text(calendar.options.extras.rangeEnd.format('D-M-Y'));

                                                        $.each(roomData.room, function (_key, value) {
                                                                if (value.ID == roomId) {
                                                                        modal.find('.room-type').text(value.post_title);
                                                                        modal.find('.room-image').attr('src', value.room_thumbnail_url);
                                                                        modal.find('.price').text(value.room_price);
                                                                }

                                                        });

                                                        // Show Modal after populating all the elements.
                                                        modal.modal('show');

                                                        // When price is updated.
                                                        $('#update-price-modal-button').on('click', function () {
                                                                var priceInput = modal.find('#new-price');
                                                                var price = priceInput.val();
                                                                if (!price) {
                                                                        $('#new-price').validate();
                                                                        return;
                                                                }
                                                                else {
                                                                        $.post(
                                                                                ajaxurl,
                                                                                {
                                                                                        action: 'insertPriceRange',
                                                                                        roomType: roomId,
                                                                                        price: price,
                                                                                        startDate: calendar.options.extras.rangeStart.format('D-M-Y'),
                                                                                        endDate: calendar.options.extras.rangeEnd.format('D-M-Y'),
                                                                                },
                                                                                function (response) {
                                                                                        if (response == true) {
                                                                                                modal.modal('hide');
                                                                                                location.reload();
                                                                                        }
                                                                                }
                                                                        );
                                                                }
                                                        });

                                                        // Modal Cancel Button
                                                        $('#update-price-cancel-button').on('click', function () {
                                                                modal.modal('hide');
                                                                location.reload();
                                                        });

                                                        // Restore Price Range link
                                                        $('#delete-price').on('click', function () {
                                                                $.post(
                                                                        ajaxurl,
                                                                        {
                                                                                action: 'deletePriceRange',
                                                                                roomType: roomId,
                                                                                startDate: calendar.options.extras.rangeStart.format('D-M-Y'),
                                                                                endDate: calendar.options.extras.rangeEnd.format('D-M-Y'),
                                                                        },
                                                                        function (response) {
                                                                                if (response == true) {
                                                                                        modal.modal('hide');
                                                                                        location.reload();
                                                                                }
                                                                        }
                                                                );
                                                        });

                                                        // Set the Room Id extras variable back to null.
                                                        // calendar.options.extras.roomId = null;
                                                }
                                                else {
                                                        // Second click is not from the same room or is a prev date.
                                                        calendar.render();
                                                }
                                        }
                                },
                        },
                        extras: {
                                rangeStart: '',
                                rangeEnd: '',
                                roomId: '',
                                clicks: 0,

                        }

                });

                // $('body').on('click', '.months', function () {
                //         pricingCalendar.setIntervalStart('march');

                // });

        });
})(window.jQuery);