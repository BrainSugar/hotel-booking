<?php

namespace Brainsugar\Http\Controllers\Admin;

use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Model\Reservations;
use Brainsugar\Model\ReservationItemMeta;

class PopupController extends Controller
{

  public function getReservationPopupDetails($reservationId)
  {
          $reservationItems = new ReservationItemMeta;
          $guestDetails = $reservationItems->getGuestDetails($reservationId);
          $reservation = new Reservations;
          $reservationDetails = $reservation->getReservation($reservationId);
        
          $popup = Brainsugar()->view('Admin.Popups.reservation-details')
          ->with('guest' , $guestDetails)
           ->with('reservation' , $reservationDetails)
          ->render('true');

          return $popup;

   
  }

}