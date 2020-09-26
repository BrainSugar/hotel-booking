<?php 

namespace Brainsugar\Http\Controllers\Frontend;

use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Model\Reservations;
use Brainsugar\Model\ReservationCart;
use Brainsugar\Model\Services;
Use Carbon\Carbon;
// use Brainsugar\Core\CoreFunctions;

class CheckoutController extends Controller {

        public function getServicesTemplate() {

                $service = new Service;
                $serviceIds = $service->getServiceId();

                ob_start();
                        echo  bshb_get_template_part('checkout/checkout', 'services' ,$serviceIds);
               $response = ob_get_clean();

                return $response;

        }

}