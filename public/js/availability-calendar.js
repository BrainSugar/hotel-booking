(function ($) {

        'use strict';

        $(document).ready(function () {
                alert(reservations);
                console.log(reservations);
                var bookings = [
                        {
                                bookingId: '360',
                                roomId: '360',
                                status: 'booked',
                                endDate: '2020-11-13',
                                startDate: '2020-11-11'
                        },
                        // {
                        //         bookingId: '522',
                        //         roomId: '361',
                        //         status: 'booked',
                        //         endDate: moment().add(2, 'days'),
                        //         startDate: moment().subtract(2, 'days')
                        // },
                        // {
                        //         bookingId: '367',
                        //         roomId: '367',
                        //         status: 'booked',
                        //         endDate: moment().add(1, 'days'),
                        //         startDate: moment()
                        // },
                        // {
                        //         bookingId: '364',
                        //         roomId: '364',
                        //         status: 'booked',
                        //         endDate: moment().add(7, 'days'),
                        //         startDate: moment().add(1, 'days')
                        // },
                ];

                var post_template = wp.template('availability-calendar');

                var calendar = $('#availability-calendar').clndr({
                        render: function (data) {
                                return post_template(data);
                        },
                        events: reservations,
                        multiDayEvents: {
                                endDate: 'end_date',
                                startDate: 'start_date'
                        },
                        lengthOfTime: {
                                days: 7,
                                interval: 7,
                        }
                });
                alert(calendar);
                console.log(calendar);
        });



        $('body').on('click', '.bookings', function () {
                var bookingId = $(this).data('booking-id');
                var modal = $('#show-reservation-modal');
                modal.find('.modal-title').html("Reservation ID : #" + bookingId);
                modal.find('.guest-name').html("Shreyas");
                modal.modal('show');
        });
})(window.jQuery);


