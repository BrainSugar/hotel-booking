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
      'get' => 'Calendar\CalendarController@roomCalendar',      
    ]
  ],
//   'second_custom_page' => [
//     'title'      => 'Second',
//     'capability' => 'read',
//     'route'      => [
//       'post' => 'Dashboard\DashboardController@secondCustomPage',
//     ]
//   ],
];