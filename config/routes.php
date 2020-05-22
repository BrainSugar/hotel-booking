<?php

/*
|--------------------------------------------------------------------------
| Custom page routes
|--------------------------------------------------------------------------
|
| Here is where you can register all page routes for your custom view.
| Then you will use $plugin->getPageUrl( 'custom_page' ) to get the URL.
|
*/

return [
        'room_calendar' => [
                'title'      => 'Room Calendar',
                'capability' => 'read',
                'route'      => [
                        'get' => 'Admin\CalendarController@individualRoomCalendar',      
                ],
        ],
        'room_pricing' => [
                'title'      => 'Room Pricing',
                'capability' => 'read',
                'route'      => [
                        'get' => 'Admin\PricingController@individualRoomPricing',      
                ]
        ],
];