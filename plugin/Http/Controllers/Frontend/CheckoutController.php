<?php 

namespace Brainsugar\Http\Controllers\Frontend;

use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Model\Reservations;
use Brainsugar\Model\ReservationCart;
use Brainsugar\Model\Services;
Use Carbon\Carbon;
// use Brainsugar\Core\CoreFunctions;

class CheckoutController extends Controller {

public function setReservationData(){
        $reservation = new Reservations;

                 $response = $reservation->createReservation();                
          
        
       
        return $response;

}

}