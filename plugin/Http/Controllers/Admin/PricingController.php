<?php 

namespace Brainsugar\Http\Controllers\Admin;

use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Model\Room;
use Brainsugar\Model\Pricing;


class PricingController extends Controller
{
        
        public function index(){
                
                $pricingModel = new Pricing; 
                $priceRange = $pricingModel->all();
                
                $roomData = get_posts(array(
                        'post_type' => 'bshb_room'
                ));
                
                // Add Room Featured image to the Data.
                foreach($roomData as $room) {                        
                        $room->room_thumbnail_url = get_the_post_thumbnail_url($room->ID);
                        $room->room_price = get_post_meta($room->ID , $key = 'bshb_rack_rate');
                }
                
                // Send room data to calendar template.
                wp_localize_script('pricing-calendar', 'roomData', array('room' => $roomData, 'price' => $priceRange));
                
                
                return Brainsugar()
                ->view('Admin.pricing-calendar')                    
                ->withAdminScripts('pricing-calendar')
                ->withAdminScripts('bootstrap.bundle');
                
                
        }
        
        public function individualRoomTypePricing() {
                
                //     Get the Room Type from the requesting URL.
                $roomType = $_GET['room_type'];
                
                $roomData = get_post($roomType);
                $pricingModel = new Pricing;
                $priceRange = $pricingModel->getPriceRange($roomType);
                
                // Add Room Featured image to the Data.        
                $roomData->room_thumbnail_url = get_the_post_thumbnail_url($roomType);
                $roomData->room_price = get_post_meta($roomType , $key = 'bshb_rack_rate');

                // Send room data to calendar template.
                wp_localize_script('room-pricing', 'roomData', array('room' => $roomData, 'price' => $priceRange));               
                
                return Brainsugar()
                ->view('Admin.room-pricing')                 
                 ->withAdminScripts('bootstrap.bundle')
                ->withAdminScripts('room-pricing');
        }
}