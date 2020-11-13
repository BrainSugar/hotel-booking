<?php

namespace Brainsugar\Ajax;

use Brainsugar\WPBones\Foundation\WordPressAjaxServiceProvider as ServiceProvider;
use Brainsugar\Http\Controllers\Frontend\CheckoutController;

class CheckoutAjax extends ServiceProvider
{

  /**
   * List of the ajax actions executed by both logged and not logged users.
   * Here you will used a methods list.
   *
   * @var array
   */
  protected $trusted = [
    'createReservation'
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

  public function createReservation()
  {
        $guestDetails = [];
        $paymentMethod = [];
        parse_str($_POST['guestDetails'] , $guestDetails);
        parse_str($_POST['paymentMethod'] , $paymentMethod);

        $checkout = new CheckoutController();
        $response = $checkout->setReservationData();
        // $checkout->setReservationData($guestDetails , $paymentMethod);

        
          return   wp_send_json( $response );
 
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