<?php 

namespace Brainsugar\Http\Controllers\Admin;

use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Model\Room;
use Brainsugar\Model\Pricing;
use Brainsugar\Model\Reservations;
use Brainsugar\Core\CoreFunctions;

class CalendarController extends Controller     {
        
        public function availabilityCalendar()
        {
                $roomModel = new Room;
                $sort = CoreFunctions::getRoomSorting();                
                $roomData = $roomModel->orderBy($sort['column'],$sort['order'] )->get();
                $reservationModel = new Reservations;
                $reservations = $reservationModel->getReservationsForAvailabilityCalendar();
                
                // Add Room Featured image to the Data.
                foreach($roomData as $room) {
                        $room->room_thumbnail_url = get_the_post_thumbnail_url($room->room_type);
                        $room->room_type_name = get_the_title( $room->room_type );
                }
                
                
                
                
                // Send room data to calendar template.
                wp_localize_script('availability-calendar', 'roomData', $roomData );
                 wp_localize_script('availability-calendar', 'reservations', $reservations );
                
                return Brainsugar()
                ->view('Admin.availability-calendar')
                ->withAdminScripts('availability-calendar')
                ->withAdminScripts('bootstrap.bundle')            
                ->withAdminStyles('app');
                
                
                
                
        }
        
        public function IndividualRoomCalendar() {
                
                //     Get the Room ID from the requesting URL.
                $roomId = $_GET['room_id'];
                
                // Get the details of the room by specifying room ID.
                $roomModel = new Room;
                $roomData = $roomModel->where('id' , $roomId)->first();

                $reservationModel = new Reservations;
                $reservations = $reservationModel->getReservationsForAvailabilityCalendar($roomId);
                
                // Add Featured image for the retrieved room ID.
                $roomData->room_thumbnail_url = get_the_post_thumbnail_url($roomData->room_type);
                // Add the Room type for the retrieved room ID
                $roomData->room_type_name = get_the_title( $roomData->room_type );
                
                // Send the Room Data to the calendar template.
                wp_localize_script('room-calendar', 'roomData', $roomData );
                wp_localize_script('room-calendar', 'reservations', $reservations);
                
                return Brainsugar()
                ->view('Admin.room-availability') 
                ->withAdminStyles('app')               
                ->withAdminScripts('room-calendar');
                
        }
        
}