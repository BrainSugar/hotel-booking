<?php

namespace Brainsugar\Ajax;

use Brainsugar\Http\Controllers\Frontend\CheckoutController;
use Brainsugar\WPBones\Foundation\WordPressAjaxServiceProvider as ServiceProvider;

class CheckoutAjax extends ServiceProvider
{
    /**
     * List of the ajax actions executed by both logged and not logged users.
     * Here you will used a methods list.
     *
     * @var array
     */
    protected $trusted = [
    'captureReservation',
  ];

    /**
     * List of the ajax actions executed only by logged in users.
     * Here you will used a methods list.
     *
     * @var array
     */
    protected $logged = [
    'logged',
  ];

    /**
     * List of the ajax actions executed only by not logged in user, usually from frontend.
     * Here you will used a methods list.
     *
     * @var array
     */
    protected $notLogged = [
    'notLogged',
  ];

    protected $checkout;

    public function __construct()
    {
        $this->checkout = new CheckoutController();
    }

    public function captureReservation()
    {
        // $guestForm = [];
        // $paymentForm = [];

        // parse_str($_POST['guestDetails'], $guestForm);
        // parse_str($_POST['paymentMethod'], $paymentForm);

        // $paymentMethod = $paymentForm['payment_option'];

        // $response = $this->checkout->captureReservation();
        $response = get_rest_url();

        // $checkout = new CheckoutController();
        // $response = $checkout->setReservationData($guestDetails , $paymentMethod);
        // $response = $paymentMethod;
        // $checkout->setReservationData($guestDetails , $paymentMethod);
        // echo 'rofl lol';

        return   wp_send_json($response);
    }

    public function logged()
    {
        $response = 'You have clicked Ajax Logged';

        wp_send_json($response);
    }

    public function notLogged()
    {
        $response = 'You have clicked Ajax notLogged';

        wp_send_json($response);
    }
}
