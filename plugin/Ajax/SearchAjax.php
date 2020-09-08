<?php

namespace Brainsugar\Ajax;

use Brainsugar\WPBones\Foundation\WordPressAjaxServiceProvider as ServiceProvider;
use Brainsugar\Http\Controllers\Frontend\SearchController;
use Brainsugar\Model\Sessions;
use Brainsugar\Model\ReservationCart;


class SearchAjax extends ServiceProvider {

  /**
   * List of the ajax actions executed by both logged and not logged users.
   * Here you will used a methods list.
   *
   * @var array
   */
  protected $trusted = [
          'searchSession',
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

        // Check previous search and destroy their cart values
        $this->clearPreviousSearch();
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
  }

//   public function searchSession() {
//           if(isset($_SESSION['bshb_session_value'])){
//                   $searchSession = \unserialize($_SESSION['bshb_session_value']);                  
//           }
//           wp_send_json( $searchSession ); 
//   }

  public function clearPreviousSearch() {
                 if(isset($_SESSION['bshb_session_cart'])){                 
                          $cart = new ReservationCart;
                          $cart->deleteCartItems($_SESSION['bshb_session_cart']);
                  }
          }  
}
