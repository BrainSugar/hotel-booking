<?php

namespace Brainsugar\Repositories;

use Brainsugar\Providers\PaymentGatewayServiceProvider;

class PaymentRepository
{
    protected $gateways;

    public function __construct()
    {
        $paymentServiceProvider = new PaymentGatewayServiceProvider();
        $this->gateways = $paymentServiceProvider->getPaymentGateways();
    }

    public function pay($paymentGateway)
    {
        $selectedGateway = $this->gateways[$paymentGateway];
        $response = $selectedGateway->pay();

        return $response;
    }

//     public function capturePayments()
//     {
//         $token = $_GET['token'];
//         var_dump($token);
//     }

    /**
     * Get the value of gateways.
     */
    public function getGateways()
    {
        return $this->gateways;
    }
}
