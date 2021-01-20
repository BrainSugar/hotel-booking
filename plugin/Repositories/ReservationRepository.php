<?php 

namespace Brainsugar\Repositories;

use Brainsugar\Model\Reservations;
use Brainsugar\Model\ReservationItems;
use Brainsugar\Model\ReservationItemMeta;

class ReservationRepository {
        
        protected $reservations;
        protected $reservationItems;
        protected $reservationItemMeta;
        
        public function __construct(){
                $this->reservations = new Reservations;
                $this->reservationItems = new ReservationItems;
                $this->reservationItemMeta = new ReservationItemMeta;
        }
        
        public function all(){
                return $this->reservations
                ->with('ReservationItems')
                ->with('ReservationItemMeta')
                ->get()->toArray();
        }
        
        public function findByID($reservationId){
                return $this->reservations->where('reservation_id' , $reservationId)
                ->with('ReservationItems')
                ->with('ReservationItemMeta')
                ->firstOrFail()
                ->toArray();
                // ->map(function($reservation){
                //                 return $this->format($reservation);
                // })->toArray();
        }
                
        // private function format($reservation) {
        //         return ['reservation_id' => $reservation->reservation_id ,
        //                 'check_in' => $reservation->check_in ,
        //                 'check_out' => $reservation->check_out ,
        //                 'reservation_status' => $reservation->reservation_status ,
        //                 'reservation_items' => $reservation->reservation_items ,
        //                 'guest_details' => \unserialize($reservation->reservation_item_meta)];
        // }
                
                
                
                // protected function formatItemMeta($itemMeta){
                        //        foreach($itemMeta as $item){
                                
                                //        }
                                // }
                                
                        }