<?php

namespace Brainsugar\Http\Controllers\Frontend;

use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Model\Room;
use Brainsugar\Repositories\RoomRepository;
use Brainsugar\Repositories\SessionRepository;
use Carbon\Carbon;

// use Brainsugar\Core\CoreFunctions;

class SearchController extends Controller
{
    /**
     * Instance of Session Repository.
     *
     * @var object
     */
    protected $session;

    /**
     * Instance of RoomRepository.
     *
     * @var object
     */
    protected $rooms;

    public function __construct()
    {
        $this->session = new SessionRepository();
        $this->rooms = new RoomRepository();
    }

    /**
     * Get Search results.
     *
     * @return array
     */
    public function getSearchResults()
    {
        // Save search session
        $this->session->saveSession();

        // get search templates
        $searchTemplate = $this->_getSearchTemplate();
        $sidebarTemplate = $this->_getSidebarTemplate();

        $templates = [
                        'searchResults' => $searchTemplate,
                        'sidebarDates' => $sidebarTemplate,
                ];

        return $templates;
    }

    /**
     * Get Search Template.
     *
     * get search data from session and get available rooms ,
     * set data for the template and return HTML
     *
     * @return html
     */
    private function _getSearchTemplate()
    {
        // Get search session
        $checkIn = $this->session->get('bshb_check_in');
        $checkOut = $this->session->get('bshb_check_out');
        $adults = $this->session->get('bshb_adults');
        $children = $this->session->get('bshb_children');

        // get sorting and filters
        $filterPrice = $this->session->get('bshb_search_price');
        $filterView = $this->session->get('bshb_search_view');
        $sort = $this->session->get('bshb_search_sort');

        $availableRooms = $this->rooms->getAvailableRooms($checkIn, $checkOut, $adults, $children);

        // load data for template
        $roomTypes = [];
        $roomsLeft = [];

        foreach ($availableRooms as $key => $value) {
            $countOfRooms = count($value);
            $roomsLeft[$key] = $countOfRooms;
            array_push($roomTypes, $key);
        }

        // Get post data for the avai;able room types.
        $posts = get_posts(
            [
                        'post_type' => 'bshb_room',
                        'post__in' => $roomTypes,
                        'orderby' => 'meta_value_num',
                        'meta_key' => 'bshb_rack_rate',
                        'order' => $sort,
                        ]
        );

        // Send all the data into an object to be sent to the template
        $data = (object) [
                        'room_data' => $availableRooms,
                        'roomsLeft' => $roomsLeft,
                        'check_in' => $checkIn,
                        'check_out' => $checkOut,
                        'price_filter' => $filterPrice,
                        'posts' => $posts,
                ];

        // Call the search results template and fill the data
        ob_start();
        echo  bshb_get_template_part('loop-room/rooms', $filterView, $data);
        $response = ob_get_clean();

        return $response;
    }

    /**
     * Get sidebar template.
     *
     * Get dates from session , format them for the template
     * and return the template
     *
     * @return html
     */
    private function _getSidebarTemplate()
    {
        // get search session
        $checkIn = $this->session->get('bshb_check_in');
        $checkOut = $this->session->get('bshb_check_out');

        // Format the Check in Date to template usable data
        $checkInFormat = [
                        'day' => carbon::create($checkIn)->format('d'),
                        'month' => carbon::create($checkIn)->format('F'),
                        'year' => carbon::create($checkIn)->format('Y'),
                ];

        // Format Check out date to template usable data
        $checkOutFormat = [
                        'day' => carbon::create($checkOut)->format('d'),
                        'month' => carbon::create($checkOut)->format('F'),
                        'year' => carbon::create($checkOut)->format('Y'),
                ];

        // Send formatted dates to an object to be used by the template
        $data = (object) [
                        'check_in' => $checkInFormat,
                        'check_out' => $checkOutFormat,
                ];

        // Call the sidebar template and fill the data
        ob_start();
        echo  bshb_get_template_part('search/session', 'dates', $data);
        $response = ob_get_clean();

        return $response;
    }
}
