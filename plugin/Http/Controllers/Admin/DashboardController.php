<?php

namespace Brainsugar\Http\Controllers\Admin;

use Brainsugar\Repositories\ReservationRepository;
use Brainsugar\Repositories\RoomRepository;
use Brainsugar\Http\Controllers\Controller;
use Brainsugar\PureCSSTabs\PureCSSTabsProvider;
use Brainsugar\PureCSSSwitch\PureCSSSwitchProvider;
use Brainsugar\WPBones\Foundation\Log\Log;
use Brainsugar\Model\Reservations;
use Carbon_Fields\Field;
use Carbon_Fields\Container;


class DashboardController extends Controller
{
        
        public function index(){

                $reservationRepo = new ReservationRepository;
                $reservationtest = $reservationRepo->all();

                $roomRepo = new RoomRepository;
                // $r = $roomRepo->getRoomUnits()->where('room_type' , 557)->toArray();
                $roomTypes = $roomRepo->getAvailableRooms('2020-11-21' , '2020-11-25' , 2 , 1);
                // $roomid = [];
                // foreach($roomTypes as $room){                       
                //         array_push($roomid , $room->item_id);
                // }
                // $room = $roomTypes[0]['reservation_items'];

                // $rr = $roomTypes[0]->room_name;


                // $reservation = new Reservations;
                // $reservations = $reservation->getReservationsForDashboard();
                // wp_localize_script('dashboard-calendar', 'reservations', $reservations );
                
                return Brainsugar()
                ->view('Admin.dashboard')
                ->with('reservations',$reservationtest)
                ->with('roomTypes' , $roomTypes)
                ->withAdminStyles('app')
                ->withAdminScripts('dashboard-calendar');
                
        }
}