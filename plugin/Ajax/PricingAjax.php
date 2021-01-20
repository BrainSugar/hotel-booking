<?php

namespace Brainsugar\Ajax;

use Brainsugar\Repositories\PricingRepository;
use Brainsugar\WPBones\Foundation\WordPressAjaxServiceProvider as ServiceProvider;
use Carbon\Carbon;

class PricingAjax extends ServiceProvider
{
    /**
     * List of the ajax actions executed by both logged and not logged users.
     * Here you will used a methods list.
     *
     * @var array
     */
    protected $trusted = [
                'trusted',
        ];

    /**
     * List of the ajax actions executed only by logged in users.
     * Here you will used a methods list.
     *
     * @var array
     */
    protected $logged = [
                'insertPriceRange',
                'deletePriceRange',
        ];

    /**
     * List of the ajax actions executed only by not logged in user, usually from frontend.
     * Here you will used a methods list.
     *
     * @var array
     */
    protected $notLogged = [
                'notLogged',
        ];

    /**
     * Instance of Pricing Repository.
     *
     * @var object
     */
    protected $pricing;

    public function __construct()
    {
        $this->pricing = new PricingRepository();
    }

    /**
     * Insert Price Range.
     *
     * @return json
     */
    public function insertPriceRange()
    {
        $roomType = $_POST['roomType'];
        $price = $_POST['price'];
        $startDate = Carbon::create($_POST['startDate'])->format('Y-m-d');
        $endDate = Carbon::create($_POST['endDate'])->format('Y-m-d');

        $response = $this->pricing->addRoomPriceRange($roomType, $price, $startDate, $endDate);

        wp_send_json($response);
    }

    /**
     * Delete prices from select dates.
     *
     * @return Json
     */
    public function deletePriceRange()
    {
        $roomType = $_POST['roomType'];
        $startDate = Carbon::create($_POST['startDate'])->format('Y-m-d');
        $endDate = Carbon::create($_POST['endDate'])->format('Y-m-d');

        $response = $this->pricing->deleteRoomPriceRange($roomType, $startDate, $endDate);

        wp_send_json($response);
    }
}
