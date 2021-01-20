<?php

namespace Brainsugar\Http\Controllers\Frontend;

use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Repositories\PaymentRepository;
use Brainsugar\Repositories\ReservationRepository;
use Brainsugar\Repositories\SessionRepository;

class CheckoutController extends Controller
{
    protected $payment;
    protected $reservation;
    protected $session;

    public function __construct()
    {
        $this->payment = new PaymentRepository();
        $this->reservation = new ReservationRepository();
        $this->session = new SessionRepository();
    }

    public function captureReservation()
    {
        // $this->session->set('bshb_payment_method', $paymentMethod);
        $response = 'this is api route';

        echo $response;
    }

//     public function setReservationData($guestDetails, $paymentMethod)
//     {
//         $reservation = new Reservations();
//         $response = $reservation->createReservation($guestDetails, $paymentMethod);

//         return $response;
//     }
}
