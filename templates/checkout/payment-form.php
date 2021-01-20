<?php
/**
* Payment Method Form.
*
* This template can be overridden by copying it to {YOURTHEME}/bshb-template/checkout/
*
* @see http://docs.brainsugar.studio/hotel-booking/
*
* @author Brainsugar Studio
*
* @version 1.0
*/
if (!defined('ABSPATH')) {
    exit;  //Exit if accessed directly.
}
$gateways = bshb_get_payment_gateways();
?>
<div class="payment-container">
        <h1 class="display-4 mb-5"><?php echo esc_html('Payment', 'bshb'); ?></h1>
        <div class="row mx-5">      
                <div class="col-sm-12">
                <span class="payment-error"></span>
                <form id="payment_gateways">
                        <div class="radio">
                        <?php foreach ($gateways as $gateway) {  ?>
                                <input type="radio" id="<?php echo esc_attr($gateway->id); ?>" name="payment_option" value="<?php echo esc_attr($gateway->id); ?>" >
                                <label for="<?php echo esc_attr($gateway->id); ?>"><?php echo esc_attr($gateway->name); ?></label>
                        <?php } ?>
                        </div>
                </form>
                </div>
        </div>
        <hr>
        <div class="row">
                <div class="col-sm-12">
                        <div id = "bshb-payment-total" class="reserve-booking">
                                <?php $total = bshb_get_cart_total(); ?>
                                <h1 class="display-4"><?php echo bshb_format_currency($total['total']); ?></h1>
                                <button id = "bshb-reserve-booking" class="btn btn-primary" data-total = "<?php echo esc_attr($total['total']); ?>"><?php esc_html_e('Reserve Booking', 'bshb-td'); ?></button>                        
                        </div>                        
                </div>
        </div>
</div>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

    <!-- Include the PayPal JavaScript SDK -->
  <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=INR" data-namespace="paypal_sdk"></script>
    <script>
    (function ($) {
            
        'use strict';

        $(document).ready(function () {
        // Render the PayPal button into #paypal-button-container
        console.log(paypal);
        paypal_sdk.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                //      return $.post(
                //                 ajaxurl,
                //                 {
                //                         action: 'captureReservation',
                //                         // guestDetails: guestDetails,
                //                         // paymentMethod: paymentMethod
                //                 },
                //                 function (response) {
                //                         // window.location.href = response.href;
                //                         console.log(response);
                //                           return response.orderId

                //                 },
                //         );
                    return fetch( 'http://localhost/wordpress/wp-json/bshb/v1/paypal/' , {
                    method: 'post',
                //     action: 'captureReservation',
                }).then(function(res) {
                        console.log(res);
                    return res.json();
                }).then(function(orderData) {
                        console.log(orderData);
                    return orderData.result.id;
                });
                
                // return actions.order.create({
                //     purchase_units: [{
                //         amount: {
                //             value: '88.44'
                //         }
                //     }]
                // });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }


        }).render('#paypal-button-container');
});
})(window.jQuery);
    </script>