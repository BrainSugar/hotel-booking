(function ($) {

        'use strict';

        $(document).ready(function () {

                // Store the template in a variable.
                var roomCalendarTemplate = wp.template('room-calendar');

                $('#room-calendar').clndr({
                        moment: moment,
                        numberOfRows: 5,
                        events: reservations,
                        multiDayEvents: {
                                endDate: 'end_date',
                                startDate: 'start_date'
                        },

                        render: function (data) {
                                return roomCalendarTemplate(data);
                        },
                });
        });
})(window.jQuery);