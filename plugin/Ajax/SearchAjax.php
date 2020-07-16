<?php

namespace Brainsugar\Ajax;

use Brainsugar\WPBones\Foundation\WordPressAjaxServiceProvider as ServiceProvider;
use Brainsugar\Model\Reservations;

class SearchAjax extends ServiceProvider {

  /**
   * List of the ajax actions executed by both logged and not logged users.
   * Here you will used a methods list.
   *
   * @var array
   */
  protected $trusted = [
    'availabilitySearch'
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

  public function availabilitySearch()
  {
          $reservation = new Reservations;
          $res = $reservation->get();
        $roomData = get_posts(array(
                        'post_type' => 'bshb_room',
                        'fields'          => 'ids'
                ));
          $checkIn = $_POST['checkIn'];
          $checkOut = $_POST['checkOut'];
          $adults = $_POST['adults'];
          $children = $_POST['children'];
        //   $data= array (
        //         'in' => $checkIn ,
        //         'out' => $checkOut,
        //         'res' => $res,
        //         'adults' => $adults,
        //         'children' => $children,
        // 'rooms' => $roomData);

        $dates = (object) [
                "check_in" => $checkIn ,
                "check_out" => $checkOut
        ];

        bshb_get_template_part('search/search-results/sidebar', 'dates' , $dates);

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
