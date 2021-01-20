<?php

namespace Brainsugar\Ajax;

use Brainsugar\Http\Controllers\Frontend\SearchController;
use Brainsugar\Repositories\SessionRepository;
use Brainsugar\WPBones\Foundation\WordPressAjaxServiceProvider as ServiceProvider;

// use Brainsugar\Model\Coupon;
// use Brainsugar\Model\Sessions;
// use Brainsugar\Model\ReservationCart;

class SearchAjax extends ServiceProvider
{
    /**
     * List of the ajax actions executed by both logged and not logged users.
     * Here you will used a methods list.
     *
     * @var array
     */
    protected $trusted = [
                'searchSession',
                'searchAvailability',
        ];

    /**
     * List of the ajax actions executed only by logged in users.
     * Here you will used a methods list.
     *
     * @var array
     */
    protected $logged = [];

    /**
     * List of the ajax actions executed only by not logged in user, usually from frontend.
     * Here you will used a methods list.
     *
     * @var array
     */
    protected $notLogged = [];

    /**
     * Instance of search Controller.
     *
     * @var object
     */
    protected $search;

    /**
     * Instance of Session.
     *
     * @var object
     */
    protected $session;

    public function __construct()
    {
        $this->search = new SearchController();
        $this->session = new SessionRepository();
    }

    /**
     * Search Available Rooms.
     *
     * Set session variables from post variables and
     * get search and sidebar templates
     *
     * @return void
     */
    public function searchAvailability()
    {
        $this->_clearSearch();

        // set search session variables
        $this->session->set('bshb_check_in', $_POST['checkInDate']);
        $this->session->set('bshb_check_out', $_POST['checkOutDate']);
        $this->session->set('bshb_adults', $_POST['adults']);
        $this->session->set('bshb_children', $_POST['children']);

        // set filters and sorting
        $this->session->set('bshb_search_view', $_POST['filterView']);
        $this->session->set('bshb_search_price', $_POST['filterPrice']);
        $this->session->set('bshb_search_sort', $_POST['sortPrice']);

        // Search results
        $response = $this->search->getSearchResults();

        wp_send_json($response);
    }

    /**
     * Clear previous search session.
     *
     * @return void
     */
    private function _clearSearch()
    {
        // unset coupon
        $this->session->remove('bshb_coupon');

        //   unset search variables
        $this->session->remove('bshb_check_in');
        $this->session->remove('bshb_check_out');
        $this->session->remove('bshb_adults');

        //   unset sorting and filters
        $this->session->remove('bshb_search_view');
        $this->session->remove('bshb_search_price');
        $this->session->remove('bshb_search_sort');
    }
}
