(function ($) {

        'use strict';

        $(document).ready(function () {
                alert("room calendar");

                var bookings = [
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
                                startDate: moment().add(5, 'days')
                        },
                ];

                // Store the template in a variable.
                var roomCalendarTemplate = wp.template('room-calendar');



                $('#room-calendar').clndr({
                        moment: moment,
                        numberOfRows: 5,
                        events: bookings,
                        multiDayEvents: {
                                endDate: 'endDate',
                                startDate: 'startDate'
                        },

                        render: function (data) {
                                return roomCalendarTemplate(data);
                        },

                        // lengthOfTime: {
                        //         days: 7,
                        //         interval: 7,
                        // }
                });
        });
})(window.jQuery);