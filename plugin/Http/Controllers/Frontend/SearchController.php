<?php 

namespace Brainsugar\Http\Controllers\Frontend;

use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Model\Reservations;
Use Carbon\Carbon;
// use Brainsugar\Core\CoreFunctions;

class SearchController extends Controller
{
        public function getSearchResults($checkInDate , $checkOutDate , $adults , $children = null) {
                
               
        }
        public function getSidebarDatesTemplate($checkInDate , $checkOutDate) {

                // Format the Check in Date to template usable data
                $checkInFormat = array(
                        "day" => carbon::create($checkInDate)->format('d'),
                        "month" => carbon::create($checkInDate)->format('F'),
                        "year" => carbon::create($checkInDate)->format('Y'),
                );
                // Format Check out date to template usable data
                $checkOutFormat = array(
                        "day" => carbon::create($checkOutDate)->format('d'),
                        "month" => carbon::create($checkOutDate)->format('F'),
                        "year" => carbon::create($checkOutDate)->format('Y'),
                );
                // Send formatted dates to an object to be used by the template
                $data = (object) [
                        "check_in" => $checkInFormat,
                        "check_out" => $checkOutFormat
                ];

                // Call the sidebar template and fill the data
                ob_start();
               echo  bshb_get_template_part('search/search-results/sidebar/sidebar', 'dates' , $data);
               $response = ob_get_clean();
                

                return $response;
        }
}