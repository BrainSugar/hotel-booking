(function ($) {

        'use strict';

        $(document).ready(function () {
                alert("room pricing");
                console.log(roomData);

                // Store the template in a variable.
                var roomPricingTemplate = wp.template('room-pricing');
                var priceRange = roomData.price;

                $('#room-pricing-calendar').clndr({
                        moment: moment,
                        numberOfRows: 5,
                        events: priceRange,
                        multiDayEvents: {
                                endDate: 'end_date',
                                startDate: 'start_date'
                        },
                        render: function (data) {
                                return roomPricingTemplate(data);
                        },
                });
        });
})(window.jQuery);