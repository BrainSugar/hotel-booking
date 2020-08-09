<?php 

namespace Brainsugar\Http\Controllers\Frontend;

use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Model\Reservations;
Use Carbon\Carbon;
// use Brainsugar\Core\CoreFunctions;

class SearchController extends Controller
{
        public function getSearchResultsTemplate($checkIn , $checkOut , $adults , $children = null , $filterView) {
                $reservations = new Reservations;

                // Get Available rooms for the search criteria.
                $availableRooms = $reservations->getAvailableRooms($checkIn , $checkOut , $adults , $children);

                // Get the available room types.
                $roomTypes = [];
                foreach($availableRooms as $key => $value) {
                        array_push($roomTypes , $key);                        
                }

                // Get post data for the avai;able room types.
                $posts = get_posts(
                        array(                                
                                'post_type' => 'bshb_room',
                                'post__in' => $roomTypes,
                                // 'orderby'=> 'title',
                                // 'order'	=> 'ASC',
                        )        
                );

                // Send all the data into an object to be sent to the template
                $data = (object)[                        
                        'room_data' => $availableRooms,
                        'check_in' => $checkIn,
                        'check_out' => $checkOut,
                        'posts' => $posts,
                ];

                // Call the searcj results template and fill the data
                ob_start();
                        echo  bshb_get_template_part('search/search-results/rooms', $filterView , $data);
               $response = ob_get_clean();

                return $response;
               
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