<?php

namespace Brainsugar\Providers;

use Brainsugar\Repositories\SessionRepository;
use Brainsugar\WPBones\Support\ServiceProvider;

class PaymentGatewayServiceProvider extends ServiceProvider
{
    protected $paymentGateways;

    public function __construct()
    {
        $this->registerPaymentGateways();
        $this->session = new SessionRepository();
        // $this->reservationConfirmation();
        // var_dump();
    }

    public function register()
    {
        // // do_action('bshb_gateways_end_point');
        add_action('bshb_reservation_end_point', [$this, 'capturePayment'], 10, 0);
    }

    public function registerPaymentGateways()
    {
        $paymentGateways = $this->defaultGateways();
        $paymentGateways = apply_filters('bshb_register_gateways', $paymentGateways);

        $this->paymentGateways = $paymentGateways;
    }

    private function defaultGateways()
    {
        $gateways = ['cash' => (object) [
                'id' => 'cash',
                'name' => 'Pay at Reception',
                'label' => 'Pay while you check in.',
        ]];

        return $gateways;
    }

    /**
     * Get the value of paymentGateways.
     */
    public function getPaymentGateways()
    {
        return $this->paymentGateways;
    }

    public function capturePayment()
    {
        $paymentGateway = 'paypal';
        $selectedGateway = $this->paymentGateways[$paymentGateway];
        $selectedGateway->capturePayment();
        // // $token = $_GET['token'];
        // var_dump($token);
    }
}
