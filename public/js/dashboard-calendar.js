(function ($) {

        'use strict';

        $(document).ready(function () {
                alert("dashboard calendar");
                var post_template = wp.template('dashboard-calendar');


                var bookings = [
                        {
                                bookingId: '7850',
                                roomId: '360',
                                status: 'booked',
                                endDate: moment().add(5, 'days'),
                                startDate: moment().add(1, 'days')
                        },
                        {
                                bookingId: '660',
                                roomId: '360',
                                status: 'booked',
                                endDate: moment().add(5, 'days'),
                                startDate: moment().add(2, 'days')
                        },
                        {
                                bookingId: '1000',
                                roomId: '360',
                                status: 'booked',
                                endDate: moment(),
                                startDate: moment().subtract(2, 'days')
                        },
                        {
                                bookingId: '360',
                                roomId: '360',
                                status: 'booked',
                                endDate: moment().add(5, 'days'),
                                startDate: moment()
                        },
                        {
                                bookingId: '522',
                                roomId: '361',
                                status: 'booked',
                                endDate: moment().add(10, 'days'),
                                startDate: moment(),
                        },
                ];



                $('#dashboard-reservations').clndr({

                        trackSelectedDate: true,
                        selectedDate: moment(),

                        events: bookings,
                        multiDayEvents: {
                                endDate: 'endDate',
                                startDate: 'startDate'
                        },
                        lengthOfTime: {
                                startDate: moment(),
                                days: 5,
                                interval: 5,
                        },
                        render: function (data) {
                                return post_template(data);
                        },
                        clickEvents: {
                                click: function (target) {
                                        // Set the selected date and render the calendar
                                        // console.log(target);
                                        this.options.selectedDate = target.date;
                                        this.options.extras.selectedDate = target.date;
                                        this.render();
                                },
                                onIntervalChange: function (start, end) {

                                        this.options.extras.selectedDate = start;
                                        this.options.selectedDate = start;
                                        this.render();
                                        // this.selectedDate = start;
                                        // this.options.extras.selectedDate = "";
                                        // this.render;

                                }
                        },
                        extras: {
                                // Initiallly set as the instance selectedDate. Changed during click events.
                                selectedDate: this.selectedDate,
                        }
                });


        });
})(window.jQuery);