<?php 

namespace Brainsugar\Http\Controllers\Admin;

use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Model\Room;
use Brainsugar\Model\Pricing;


class PricingController extends Controller
{

        public function index(){
                
        $roomData = get_posts(array(
        'post_type' => 'bshb_room'
        ));
        $pricingModel = new Pricing;

        
        $priceRange = $pricingModel::all();
        // $priceRange = $pricingModel->getPriceRange(559);


        // Add Room Featured image to the Data.
              foreach($roomData as $room) {
                   
                $room->room_thumbnail_url = get_the_post_thumbnail_url($room->ID);
                $room->room_price = get_post_meta($room->ID , $key = 'bshb_room_price');
        }

        // Send room data to calendar template.
                wp_localize_script('pricing-calendar', 'roomData', array('room' => $roomData, 'price' => $priceRange));
      

        return Brainsugar()
        ->view('calendar.pricing-calendar')                    
        ->withAdminScripts('pricing-calendar')
        ->withAdminScripts('bootstrap.bundle')            
        ->withAdminStyles('app');
                
        }
}