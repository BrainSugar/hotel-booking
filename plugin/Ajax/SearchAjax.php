<?php

namespace Brainsugar\Ajax;

use Brainsugar\WPBones\Foundation\WordPressAjaxServiceProvider as ServiceProvider;
use Brainsugar\Http\Controllers\Frontend\SearchController;
use Brainsugar\Model\Sessions;


class SearchAjax extends ServiceProvider {

  /**
   * List of the ajax actions executed by both logged and not logged users.
   * Here you will used a methods list.
   *
   * @var array
   */
  protected $trusted = [
    'searchAvailability'
  ];

  /**
   * List of the ajax actions executed only by logged in users.
   * Here you will used a methods list.
   *
   * @var array
   */
  protected $logged = [
    'logged'
  ];

  /**
   * List of the ajax actions executed only by not logged in user, usually from frontend.
   * Here you will used a methods list.
   *
   * @var array
   */
  protected $notLogged = [
    'notLogged'
  ];

  public function searchAvailability()
  {
        $checkIn = $_POST['checkInDate'];
        $checkOut = $_POST['checkOutDate'];
        $adults = absint($_POST['adults']);
        $children = absint($_POST['children']);
        $filterView = $_POST['filterView'];
        $filterPrice = $_POST['filterPrice'];

        if (!$filterView) {
                $filterView = "list";
        }

        if(!$filterPrice) {
                $filterPrice = "total";
        }

        // Create a session
        // Set search values in session_value.
        $session = new Sessions;      
        $session->setSessionValue($checkIn , $checkOut , $adults , $children);

        // Get search result templates.        
        $searchController = new SearchController;

        $sidebarDatesTemplate = $searchController->getSidebarDatesTemplate($checkIn , $checkOut);

        $searchResultsTemplate = $searchController->getSearchResultsTemplate($checkIn , $checkOut , $adults , $children , $filterView , $filterPrice);

        $templates = [
                "sidebarDates" => $sidebarDatesTemplate,
                "searchResults" => $searchResultsTemplate
        ];

        wp_send_json($templates);


        //   $reservation = new Reservations;
        //   $res = $reservation->get();
        // $roomData = get_posts(array(
        //                 'post_type' => 'bshb_room',
        //                 'fields'          => 'ids'
        //         ));

        //   $data= array (
        //         'in' => $checkIn ,
        //         'out' => $checkOut,
        //         'res' => $res,
        //         'adults' => $adults,
        //         'children' => $children,
        // 'rooms' => $roomData);

        // $dates = (object) [
        //         "check_in" => $checkIn ,
        //         "check_out" => $sidebarDates
        // ];

        // bshb_get_template_part('search/search-results/sidebar', 'dates' , $dates);

// bshb_get_template_part('search/search-results/rooms', 'list' , $data);


  }

  public function logged()
  {
    $response = "You have clicked Ajax Logged";

    wp_send_json( $response );
  }

  public function notLogged()
  {
    $response = "You have clicked Ajax notLogged";

    wp_send_json( $response );
  }



}
