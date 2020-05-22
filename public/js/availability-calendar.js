(function ($) {

        'use strict';

        $(document).ready(function () {
                alert("Availability Calendar");
                var bookings = [
                        {
                                bookingId: '360',
                                roomId: '360',
                                status: 'booked',
                                endDate: moment().add(3, 'days'),
                                startDate: moment()
                        },
                        {
                                bookingId: '522',
                                roomId: '361',
                                status: 'booked',
                                endDate: moment().add(2, 'days'),
                                startDate: moment().subtract(2, 'days')
                        },
                        {
                                bookingId: '367',
                                roomId: '367',
                                status: 'booked',
                                endDate: moment().add(1, 'days'),
                                startDate: moment()
                        },
                        {
                                bookingId: '364',
                                roomId: '364',
                                status: 'booked',
                                endDate: moment().add(7, 'days'),
                                startDate: moment().add(1, 'days')
                        },
                ];

                var post_template = wp.template('availability-calendar');

                $('#availability-calendar').clndr({
                        render: function (data) {
                                return post_template(data);
                        },
                        events: bookings,
                        multiDayEvents: {
                                endDate: 'endDate',
                                startDate: 'startDate'
                        },
                        lengthOfTime: {
                                days: 7,
                                interval: 7,
                        }
                });
        });

        $('body').on('click', '.bookings', function () {
                var bookingId = $(this).data('booking-id');
                var modal = $('#show-reservation-modal');
                modal.find('.modal-title').html("Reservation ID : #" + bookingId);
                modal.find('.guest-name').html("Shreyas");
                modal.modal('show');
        });
})(window.jQuery);


