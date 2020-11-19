<?php

namespace Brainsugar\Model;
use Illuminate\Database\Eloquent\Model;
use Brainsugar\Model\ReservationItems;
use Brainsugar\Model\Pricing;
use Brainsugar\Model\Room;
use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as DB;

class Reservations extends Model
{
        /**
        * The table associated with the model.
        *
        * @var string
        */
        protected $table = 'bshb_reservations';
        
        /**
        * Fillable attributes for the table,
        *
        * @var array
        */
        protected $fillable = ['reservation_id', 'check_in', 'check_out' , 'reservation_status'];
        
        /**
        * Disable Timestamps
        *
        * @var boolean
        */
        public $timestamps = false;
        
        
        /**
        * Get the table associated with the model.
        *
        * @return string
        */
        public function getTable()
        {
                global $wpdb;
                
                return $wpdb->prefix . preg_replace('/[[:<:]]' . $wpdb->prefix . '/', '', parent::getTable(), 1);
        }
        
        
        public function createReservation($guestInfo , $paymentMethod) {
                $session = new Sessions;
                $sessionValue = $session->getSessionValue();
                
                $checkIn = $sessionValue['check_in'];
                $checkOut = $sessionValue['check_out'];
                $adults = $sessionValue['adults'];
                $children = $sessionValue['children'];
                $reservationId = $_SESSION['bshb_session_cart'];

                

                $reservationStatus = "reserved";
                $items = new ReservationItems; 
                $itemMeta = new ReservationItemMeta;
                // $guestInfo = $itemMeta->getGuestDetails($reservationId);
                
                try {
                        DB::beginTransaction();
                        
                        $items->insertReservationItems($reservationId);
                        $itemMeta->insertReservationMeta($reservationId ,$guestInfo , $paymentMethod);
                        
                        $response = $this->fill(array(
                                'reservation_id' => $reservationId , 
                                'check_in' => $checkIn,
                                'check_out' => $checkOut,
                                'reservation_status' => $reservationStatus
                                ))->save(); 
                                DB::commit();
                                
                        } catch (Exception $e){
                                $response = $e;
                        }
                        // if($response == true){
                        //         $session->destroySession();
                        // }
                        return $response;
                }

                public function getReservation($reservationId){
                        $response = $this->select('reservation_id' , 'check_in' , 'check_out' , 'reservation_status')
                                        ->where('reservation_id' , $reservationId)
                                        ->first()->toArray();
                                        return $response;
                }
                
                public  function getReservationsForAvailabilityCalendar($roomId = null){
                        
                        $reservationItems = new ReservationItems;
                        $roomReservations = [];
                        $reservations = $this->get()->toArray();
                        foreach($reservations as $reservation){
                                $rooms = $reservationItems->getRoomItems($reservation['reservation_id']);
                                foreach($rooms as $room){
                                        if($roomId == null){
                                                array_push($roomReservations , [
                                                        'reservation_id' => $reservation['reservation_id'],
                                                        'room_id' => $room,
                                                        'reservation_status' => $reservation['reservation_status'],
                                                        'end_date' => $reservation['check_out'],
                                                        'start_date' => $reservation['check_in']
                                                        ]);
                                                }
                                                else if($roomId == $room){
                                                        array_push($roomReservations , [
                                                                'reservation_id' => $reservation['reservation_id'],
                                                                'room_id' => $room,
                                                                'reservation_status' => $reservation['reservation_status'],
                                                                'end_date' => $reservation['check_out'],
                                                                'start_date' => $reservation['check_in']
                                                                ]);
                                                        }
                                                }
                                        }
                                        return $roomReservations;
                                }
                                
                                /**
                                * Get the reservation ID and dates of their reservation.
                                *
                                * @param [date] $checkIn
                                * @param [date] $checkOut
                                * @param [string] $status
                                * @return object
                                */
                                public function getReservationBetweenQueryDates($checkIn , $checkOut , $status) {
                                        // get all reservations where checkin and checkout lies between reservations.
                                        $response = $this->select('reservation_id' , 'check_in' , 'check_out')
                                        ->where('reservation_status' , $status) 
                                        ->whereRaw('? between check_in and check_out' , $checkIn)
                                        ->orwhereRaw('? between check_in and check_out' , $checkOut)
                                        ->get();
                                        
                                        return $response;
                                } 
                                
                        }