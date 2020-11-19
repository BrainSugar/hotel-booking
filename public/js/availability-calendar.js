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
                $.post(
                        ajaxurl,
                        {
                                action: 'getReservationDetails',
                                reservationId: bookingId
                        },
                        function (response) {
                                // alert(response);
                                // console.log(response);

                                var modal = $('#show-reservation-modal');
                                modal.html(response);
                                // modal.find('.modal-title').html("Reservation ID : #" + bookingId);
                                // modal.find('.guest-name').html("Shreyas");
                                modal.modal('show');

                        },
                );

        });
})(window.jQuery);


