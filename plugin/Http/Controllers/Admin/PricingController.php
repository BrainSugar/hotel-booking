<?php

namespace Brainsugar\Http\Controllers\Admin;

use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Repositories\PricingRepository;
use Brainsugar\Repositories\RoomRepository;

class PricingController extends Controller
{
    /**
     * Instance of Room Repository.
     *
     * @var object
     */
    protected $rooms;
    /**
     * Instance of pricing repository.
     *
     * @var object
     */
    protected $pricing;

    public function __construct()
    {
        $this->pricing = new PricingRepository();
        $this->rooms = new RoomRepository();
    }

    /**
     * Pricing calendar for all room types.
     *
     * week view.
     *
     * @return void
     */
    public function index()
    {
        $priceRange = $this->pricing->getRoomPrices()->all();
        $roomData = $this->rooms->getRoomTypes();

        // Add Room Featured image to the Data.
        foreach ($roomData as $room) {
            $room->room_thumbnail_url = get_the_post_thumbnail_url($room->ID);
            $room->room_price = get_post_meta($room->ID, $key = 'bshb_rack_rate');
        }

        // Send room data to calendar template.
        wp_localize_script('pricing-calendar', 'roomData', ['room' => $roomData, 'price' => $priceRange]);

        return Brainsugar()
                ->view('Admin.pricing-calendar')
                ->withAdminScripts('pricing-calendar')
                ->withAdminScripts('bootstrap.bundle');
    }

    /**
     * Pricing calendar for a certain room type.
     *
     * month view
     *
     * @return void
     */
    public function individualRoomTypePricing()
    {
        //     Get the Room Type from the requesting URL.
        $roomType = $_GET['room_type'];

        $roomData = get_post($roomType);

        $priceRange = $this->pricing->getRoomPrices()->where('room_type', $roomType)->get();

        // Add Room Featured image to the Data.
        $roomData->room_thumbnail_url = get_the_post_thumbnail_url($roomType);
        $roomData->room_price = get_post_meta($roomType, $key = 'bshb_rack_rate');

        // Send room data to calendar template.
        wp_localize_script('room-pricing', 'roomData', ['room' => $roomData, 'price' => $priceRange]);

        return Brainsugar()
                ->view('Admin.room-pricing')
                 ->withAdminScripts('bootstrap.bundle')
                ->withAdminScripts('room-pricing');
    }
}
